<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->get();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::latest()->get();

        return view('rooms.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $room = $this->validateRequest();

      $room = new Room;

      $room->room_number = $request->room_number;
      $room->floor = $request->floor;
      $room->user_id = auth()->user()->id;

      $room->save();

      return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrfail($id);

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrfail($id);

        return view('rooms.edit', compact('room'));
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
        $room = $this->validateRequest();

        $room = Room::findOrfail($id);

        $room->room_number = $request->room_number;
        $room->floor = $request->floor;
        $room->user_id = auth()->user()->id;

        $room->save();

        return redirect()->route('admin.rooms.show', $room->id)->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrfail($id);

        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }

    public function validateRequest()
    {
        return request()->validate([

            'room_number' => 'required',
            'floor' => '',
        ]);

    }
}
