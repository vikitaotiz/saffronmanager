<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $this->validateRequest();

        $client = new Client;

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->gender = $request->gender;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->company_name = $request->company_name;
        $client->industry = $request->industry;
        $client->revenue_potential = $request->revenue_potential;

        $client->address = $request->address;
        $client->about = $request->about;
        $client->profile_photo = $request->profile_photo;

        $client->user_id = auth()->user()->id;

        $client->save();

        $this->storeImage($client);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        if ($client->profile_photo) {

            $profile_photo = asset('storage/'.$client->profile_photo);

        } else {

            $profile_photo = asset('img/user.png');
        }

        return view('clients.show', compact('client', 'profile_photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrfail($id);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = $this->validateRequest();

        $client = Client::findOrfail($id);

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->gender = $request->gender;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->company_name = $request->company_name;
        $client->industry = $request->industry;
        $client->revenue_potential = $request->revenue_potential;
        $client->address = $request->address;
        $client->about = $request->about;
        $client->profile_photo = $request->profile_photo;

        $client->user_id = auth()->user()->id;

        $client->save();

        $this->storeImage($client);

        return redirect()->route('admin.clients.show', $client->id)->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client->profile_photo) {
            Storage::delete( 'public/' . $client->profile_photo);            
        }

        $client->delete();

        return redirect('clients');
    }

    public function validateRequest()
    {
        return request()->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'phone' => 'required',

            'company_name' => '',
            'industry' => '',
            'revenue_potential' => '',
            'job_title' => '',
            'email' => '',
            'address' => '',
            'about' => '',
            'profile_photo' => 'sometimes|file|image|max:10000'

        ]);
        
    }

    public function storeImage($contact)
    {
        if(request()->has('profile_photo')) {
            $contact->update([
                'profile_photo' => request()->profile_photo->store('uploads/clients/profile_photos', 'public'),
            ]);

            if(getimagesize($_FILES['profile_photo']['tmp_name']))
            {
                $profile_photo = Image::make(public_path('storage/'. $contact->profile_photo))->fit(300,300);

                $profile_photo->save();
            }
        }
    }
}
