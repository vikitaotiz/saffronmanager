@extends('layouts.app')

@section('content')

            <div class="panel" style="background: {{$appointment->color}};">
                <div class="panel-heading">
                     <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i>  Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong style="color: #fff;">{{$appointment->name}}</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('admin.appointments.edit', $appointment->id)}}" class="btn btn-sm btn-default btn-block"><i class="fa fa-pencil"></i>  Edit appointment</a>
                        </div>
                    </div>
                </div>
         </div>

         <section class="invoice" id="invoice">
                <!-- title row -->
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <i class="fa fa-globe"></i> {{config('app.name')}}.
                      <small class="pull-right">Date: {{date('d/m/Y')}}</small>
                    </h2>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>{{config('app.name')}}.</strong><br>
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      Phone: (804) 123-5432<br>
                      Email: info@hotelnotel.com
                    </address>
                  </div>
                  <div class="col-sm-4 invoice-col">
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    To
                    <address>
                      <strong>
                        {{App\Client::find($appointment->client_id)->firstname}}
                        {{App\Client::find($appointment->client_id)->lastname}}
                      </strong><br>
                      Address: {{App\Client::find($appointment->client_id)->address}}<br>
                      Phone: {{App\Client::find($appointment->client_id)->phone}}<br>
                      Email: {{App\Client::find($appointment->client_id)->email}}
                    </address>
                  </div>

                  <!-- /.col -->
                </div><br><hr>
                <div class="row" style="margin: 2%;">
                    <strong>
                        Appointment Note for
                        {{App\Client::findOrfail($appointment->client_id)->firstname}}
                        {{App\Client::findOrfail($appointment->client_id)->lastname}}
                    </strong>
                </div><hr>
               <div class="row" style="margin: 2%;">

                <table class="table table-bordered">
                    <tr>
                        <th>Appointment Description: </th>
                        <td>{!! $appointment->description !!}</td>
                    </tr>
                    <tr>
                        <th>Appointment Status: </th>
                        <td>{{$appointment->status}}</td>
                    </tr>
                    <tr>
                        <th>Start Time:</th>
                        <td>{{$appointment->start_date}}</td>
                    </tr>
                    <tr>
                        <th>End Time:</th>
                        <td>{{$appointment->end_date}}</td>
                    </tr>

                    <tr>
                        <th>Created By:</th>
                        <td>{{App\User::findOrfail($appointment->user_id)->name}}</td>
                    </tr>

                    <tr>
                        <th>Created On:</th>
                        <td>{{$appointment->created_at}}</td>
                    </tr>
                </table>
                    <p></p>
               </div><hr>
                <!-- /.row -->
            <div class="row no-print">
                <div class="col-xs-12">
                    {{-- <button onclick="printContent('div2')">Print Content</button> --}}
                    {{-- <a onclick="printAppointment()" get="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> --}}
                    <button onclick="printContent('invoice')" type="button" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</button>

                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-envelope"></i>
                        Mail Letter
                    </button>

                    {{-- @if($appointment->status == 'open')
                      <a href="{{route('appointments.closeAppointment', $appointment->id)}}" class="btn btn-warning pull-right" style="margin-right: 5px;">
                          <i class="fa fa-window-close-o"></i> Close Appointment
                      </a>

                    @else
                      <a href="{{route('appointments.openAppointment', $appointment->id)}}" class="btn btn-warning pull-right" style="margin-right: 5px;">
                          <i class="fa fa-window-close-o"></i> Open Appointment
                      </a>
                    @endif --}}


                </div>
            </div>

              </section>

@endsection
