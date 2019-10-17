<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Events\NewChat;
class ContactsController extends Controller
{

    public function chats()
    {
        return view('messenger.chats');
    }

    public function get()
    {
        // get all users except the authenticated one
        $contacts = User::where('id', '!=', auth()->id())->get();
        // get a collection of items where sender_id is the user who sent us a chat
        // and chats_count is the number of unread chats we have from him
        $unreadIds = Chat::select(\DB::raw('`from` as sender_id, count(`from`) as chats_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();
        // add an unread key to each contact with the count of unread chats
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->chats_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }
    public function getChatsFor($id)
    {
        // mark all chats with the selected contact as read
        Chat::where('from', $id)->where('to', auth()->id())->update(['read' => true]);
        // get all chats between the authenticated user and the selected user
        $chats = Chat::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();
        return response()->json($chats);
    }
    public function send(Request $request)
    {
        $chat = Chat::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewChat($chat));

        return response()->json($chat);
    }
}
