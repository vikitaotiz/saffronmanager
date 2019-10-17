@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                                <button class="btn btn-sm btn-success" onclick="goBack()" style="margin-left: 3%;"><i class="fa fa-arrow-left"></i> Back</button>
                                <a href="{{route('admin.appointments.index')}}" class="btn btn-sm btn-info"><i class="fa fa-list"></i> Full List View</a>
                        </div>
                        <div class="col-md-4">
                            <strong>Bookings (Calendar)</strong>
                        </div>
                        <div class="col-md-4">
                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEvent">
                                    Create New Appointment
                        </button> --}}
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-calendar-plus-o"></i> Create New Appontment
                            </button>
                            {{-- <a href="{{ route('admin.appointments.create')}}" class="btn btn-sm btn-success btn-block"><i class="fa fa-calendar-plus-o"></i> Create New Appontment</a> --}}
                        </div>
                    </div><br>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-success">
                                @if(count($appointments) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Appointment Name</th>
                                            <th>Patient Assigned</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($appointments as $appointment)
                                            <tr>
                                                <td><a href="{{route('admin.appointments.show', $appointment->id)}}" style="color: {{$appointment->color}}; text-decoration: none;">
                                                    {{$appointment->name}}</a></td>
                                                <td style="background: {{$appointment->color}}; color: #fff">
                                                    {{App\Client::find($appointment->client_id)->firstname ?? 'N/A'}}
                                                    {{App\Client::find($appointment->client_id)->lastname ?? 'N/A'}}
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
                    <div class="col-md-8">
                         <div class="box box-success" id="calendar">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>

            </div>



  <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create New Appointment</h4>
                    </div>
                    <div class="modal-body">

                            <form action="{{route('admin.appointments.store')}}" method="post">

                                    {{csrf_field()}}
                                    <div class="row" style="padding: 2%;">
                                            <div class="form-group">
                                                  <label>Name</label>
                                                  <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name...">
                                            </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                  <label>Start Date</label>
                                                  <input type="datetime-local" name="start_date" value="{{old('start_date')}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                      <label>End Date</label>
                                                      <input type="datetime-local" name="end_date" value="{{old('end_date')}}" class="form-control">
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
                                        <input type="color" name="color" id="color" class="form-control">
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
                                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description...">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row" style="padding: 2%;">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-sm btn-success btn-block" value="Submit Appointment">
                                        </div>
                                    </div>
                                </form>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

                </div>
            </div>

</div>


@endsection
