@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                            <a href="{{route('admin.appointments.calendar')}}" class="btn btn-sm btn-info"><i class="fa fa-calendar"></i> Calendar View</a>
                        </div>
                        <div class="col-md-4">
                            <strong>All Bookings</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('admin.appointments.create')}}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-calendar-plus-o"></i> Create New appointment</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                        @if(count($appointments) > 0)
                        <table class="table table-bordered" id="appointments_table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Client Name</th>
                                    <th>Created On</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Doctor Assigned</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{$appointment->id}}</td>
                                        <td>{{$appointment->name}}</td>
                                        <td>
                                            {{App\Client::find($appointment->client_id)->firstname ?? 'N/A'}}
                                            {{App\Client::find($appointment->client_id)->lastname ?? 'N/A'}}
                                        </td>
                                        <td>{{$appointment->created_at->diffForHumans()}}</td>
                                        <td>{{Carbon\Carbon::parse($appointment->start_date)->format('d/m/Y H:i:s')}}</td>
                                        <td>{{Carbon\Carbon::parse($appointment->end_date)->format('d/m/Y H:i:s')}}</td>
                                        {{-- <td>{{App\User::find($appointment->user_id)->name ?? 'N/A'}}</td> --}}
                                        <td>{{App\User::find($appointment->user_id)->name ?? 'N/A'}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{route('admin.appointments.show', $appointment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> View</a>
                                                </div>
                                                <div class="col-md-8">
                                                    <form action="{{route('admin.appointments.destroy', $appointment->id)}}" method="POST">
                                                        {{csrf_field()}}{{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                     </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>There are no appointments</h4>
                    @endif

                </div>
            </div>

@endsection
