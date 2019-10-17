@extends('layouts.app')

@section('content')

            <div class="panel panel-success">
                <div class="panel-heading">
                     <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>{{$client->firstname}} {{$client->lastname}}</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('admin.clients.edit', $client->id)}}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-pencil"></i> Edit Client</a>
                        </div>
                    </div>
                </div></div>

                <div class="">

                    <div class="row">
                            <div class="col-md-3">

                              <!-- Profile Image -->
                              <div class="box box-success">
                                <div class="box-body box-profile">
                                  <img class="profile-client-img img-responsive img-circle" src="{{asset('images/user.png')}}" alt="{{$client->firstname}} {{$client->lastname}}'s profile picture" width="150" height="150">

                                  <h3 class="profile-clientname text-center">{{$client->firstname}} {{$client->lastname}}</h3>

                                  <p class="text-muted text-center">Test</p>

                                  <ul class="list-group list-group-unbordered">

                                     <li class="list-group-item"><strong>Phone : </strong><a class="pull-right">{{$client->phone}}</a></li>
                                     <li class="list-group-item"><strong>Address : </strong><a class="pull-right">{{$client->address}}</a></li>
                                     <li class="list-group-item"><strong>Email : </strong><a class="pull-right">{{$client->email}}</a></li>
                                     <li class="list-group-item"><strong>Created On : </strong><a class="pull-right">{{$client->created_at}}</a></li>

                                  </ul>

                                  {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->


                              <!-- /.box -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-9">

                              <div class="nav-tabs-custom">

                                <ul class="nav nav-tabs nav-tabs-success">
                                  <li class="active"><a href="#more_details" data-toggle="tab">More Details</a></li>
                                  <li><a href="#appointments" data-toggle="tab">Appointments</a></li>
                                </ul>

                                <div class="tab-content">

                                  <div class="active tab-pane" id="more_details">
                                    <div class="panel panel-success">
                                      <div class="panel-heading">
                                         More Information
                                      </div>
                                      <div class="panel-body">
                                          {!! $client->about ?? 'No Information' !!}
                                      </div>
                                    </div>
                                  </div>


                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="appointments">
                                        <h4>Client's Appointments</h4>
                                        @if (count($client->appointments) > 0)
                                            <table class="table table-bordered" id="appointments_table">
                                                <thead>
                                                    {{-- <th>#ID</th> --}}
                                                    <th>Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Staff Assigned</th>
                                                    <th>Created On</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($client->appointments as $appointment)
                                                        <tr>
                                                            {{-- <td>{{$appointment->id}}</td> --}}
                                                            <td><a href="{{route('admin.appointments.show', $appointment->id)}}"> {{$appointment->name}}</a></td>
                                                            <td>{{$appointment->start_date}}</td>
                                                            <td>{{$appointment->end_date}}</td>
                                                            <td>{{$appointment->status}}</td>
                                                            <td>{{App\User::findOrfail($appointment->user_id)->name}}</td>
                                                            <td>{{$appointment->created_at->diffForHumans()}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            client has No Appointments yet.
                                        @endif
                                  </div>

                              <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                              </div>
                              <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                          </div>

                        </div>
@endsection
