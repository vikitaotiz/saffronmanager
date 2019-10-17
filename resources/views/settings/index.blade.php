@extends('layouts.app')

@section('content')

 <div class="panel panel-success">
    <div class="panel-heading">
           <div class="row">
                 <div class="col-md-4">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                 </div>
                  <div class="col-md-4">
                     <strong>Settings</strong>
                  </div>
                  <div class="col-md-4">
                     {{-- <a href="{{route('notes.create')}}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New note</a> --}}
               </div>
           </div>
    </div>
 </div>

  <div class="panel-body">

     <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">
                 <a href="{{route('admin.departments.index')}}">Departments</a>
              </span>
              <span class="info-box-number">
                  {{App\Department::all()->count()}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-key"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">
                <a href="{{route('admin.roles.index')}}">Roles</a>
               </span>
              <span class="info-box-number">
                    {{App\Role::all()->count()}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">
                <a href="{{route('admin.users.index')}}">Users</a>
              </span>
              <span class="info-box-number">
                    {{App\User::all()->count()}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{--<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bed"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">
                    <a href="{{route('admin.rooms.index')}}">Rooms</a>
                   </span>
                  <span class="info-box-number">
                        {{App\Room::all()->count()}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div> --}}
        <!-- /.col -->
      </div><br>

    </div>
</div>

@endsection
