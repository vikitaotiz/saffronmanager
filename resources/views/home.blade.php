@extends('layouts.app')

@section('content')
<div class="row">
  <h4 class="text-center">Dashboard</h4>

  @if(auth()->user()->role_id == 1)
  <div class="col-lg-3 col-md-6 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{App\User::all()->count()}}</h3>

        <p>No. of Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif

   <!-- ./col -->
   <div class="col-lg-3 col-md-6 col-xs-12">
     <!-- small box -->
     <div class="small-box bg-green">
       <div class="inner">
         <h3>{{App\Client::all()->count()}}</h3>

         <p>No. of Clients</p>
       </div>
       <div class="icon">
         <i class="ion ion-person-stalker"></i>
       </div>
       <a href="{{route('admin.clients.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-md-6 col-xs-12">
     <!-- small box -->
     <div class="small-box bg-yellow">
       <div class="inner">
         <h3>{{App\Appointment::all()->count()}}</h3>

         <p>No. of Appointments</p>
       </div>
       <div class="icon">
         <i class="ion ion-calendar"></i>
       </div>
       <a href="{{ route('admin.appointments.calendar') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-md-6 col-xs-12">
     <!-- small box -->
     <div class="small-box bg-red">
       <div class="inner">
         <h3>{{App\Department::all()->count()}}</h3>

         <p>No. of Departments</p>
       </div>
       <div class="icon">
         <i class="ion ion-clipboard"></i>
       </div>
       <a href="{{ action('DepartmentsController@index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
     </div>
   </div>

   <!-- ./col -->

</div>
@endsection
