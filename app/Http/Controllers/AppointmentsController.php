<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointment;
use App\User;
use App\Client;
use Calendar;

class AppointmentsController extends Controller
{

    public function fullCalendar()
    {

        $clients = Client::all();
        $appointments = Appointment::all();
        $users = User::all();
        $events = [];

        $data = Appointment::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                // $end_date = $value->end_date."24:00:00";

                $events[] = Calendar::event(
                    $value->name,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    $value->id,
                    [
                        'color' => $value->color
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($events)
        ->setCallbacks([
            'dayClick' => 'function createEvent(){
                return addEvent();
            }',
            'eventClick' => 'function createEvent(){
                return showEvent();
            }'
        ]);

        return view('appointments.calendar', compact('calendar', 'clients', 'users', 'appointments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();

        $users = User::all();

        return view('appointments.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'color' => 'required',
            'description' => 'required',
            'client_id' => 'required'
        ]);

        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->start_date = $request->start_date;
        $appointment->end_date = $request->end_date;
        $appointment->color = $request->color;
        $appointment->status = $request->status;
        $appointment->description = $request->description;
        $appointment->client_id = $request->client_id;
        $appointment->user_id = $request->user_id;

        $appointment->save();

        return redirect()->route('admin.appointments.show', $appointment->id)->with('success', 'Appointment Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrfail($id);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrfail($id);

        $clients = Client::all();

        $users = User::all();

        return view('appointments.edit', compact('appointment', 'clients', 'users'));
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
        $this->validate($request, [
            'name' => 'required',
            'start_date' => '',
            'end_date' => '',
            'color' => '',
            'status' => '',
            'description' => '',
            'client_id' => 'required'
        ]);

        $appointment = Appointment::findOrfail($id);

        $appointment->name = $request->name;
        $appointment->start_date = $request->start_date;
        $appointment->end_date = $request->end_date;
        $appointment->color = $request->color;
        $appointment->status = $request->status;
        $appointment->description = $request->description;
        $appointment->client_id = $request->client_id;
        $appointment->user_id = $request->user_id;

        $appointment->save();

        return redirect('appointments')->with('success', 'Appointment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrfail($id);

        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment Deleted Successfully');
    }

    public function closeAppointment($id)
    {
       $appointment = Appointment::findOrfail($id);
        
       $appointment->status = 'closed';
       
       $appointment->save();

       return redirect()->back()->with('success', 'Appointment successfully closed!');
    }

    public function openAppointment($id)
    {
       $appointment = Appointment::findOrfail($id);
        
       $appointment->status = 'open';
       
       $appointment->save();

       return redirect()->back()->with('success', 'Appointment successfully open!');
    }
}
