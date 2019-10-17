@extends('layouts.app')

@section('content')

            <div class="panel panel-success">
                <div class="panel-heading">
                     <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Edit Booking</strong>
                        </div>
                        <div class="col-md-4">
                            {{-- <a href="{{route('clients.edit')}}" class="btn btn-sm btn-primary">Edit Client</a> --}}
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                        <form action="{{route('admin.appointments.update', $appointment->id)}}"  method="post">

                                {{csrf_field()}}{{method_field('PUT')}}

                                <div class="row" style="padding: 2%;">
                                        <div class="form-group">
                                              <label>Name</label>
                                              <input type="text" name="name" value="{{$appointment->name}}" class="form-control" placeholder="Enter Name...">
                                        </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                              <label>Start Date</label>
                                              <input type="datetime-local" name="start_date" value="{{$appointment->start_date}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                  <label>End Date</label>
                                                  <input type="datetime-local" name="end_date" value="{{$appointment->end_date}}" class="form-control">
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                              <label>Status</label>
                                              <select name="status" id="status" class="form-control">
                                                  <option value="open">Open</option>
                                                  <option value="closed">Closed</option>
                                              </select>
                                        </div>
                                    </div>
                                </div><hr>
                                <div class="row" style="padding: 2%;">
                                    <label>Choose Appointment Color</label>
                                    <input type="color" name="color" id="color" class="form-control" value="{{$appointment->color}}">
                                </div><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign client</label>
                                            <select name="client_id" id="client_id" class="form-control">
                                                @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->nhs_number}} - {{$client->firstname}} {{$client->lastname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign Staff</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div><hr>
                                 <div class="row" style="padding: 2%;">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Enter Description...">{{$appointment->description}}</textarea>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-success btn-block" value="Submit Appointment">
                                    </div>
                                </div>
                            </form>
                </div>
            </div>

@endsection
