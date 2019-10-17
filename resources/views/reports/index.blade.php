@extends('layouts.app')

@section('content')
<div class="row" style="padding: 2%;">
<div class="panel panel-success">
            <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-4">
                        <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                    </div>
                    <div class="col-md-4">
                        <strong>Reports</strong>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ action('DepartmentsController@create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New Department</a>
                    </div>
                </div>
            </div>

                <div class="panel-body">

                  <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">{{App\User::all()->count()}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                      <span class="progress-description">
                        0% Increase in 30 Days
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-key"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Roles</span>
                  <span class="info-box-number">{{App\Role::all()->count()}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                      <span class="progress-description">
                        0% Increase in 30 Days
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Departments</span>
                  <span class="info-box-number">{{App\Department::all()->count()}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                      <span class="progress-description">
                        0% Increase in 30 Days
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-file"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Forms</span>
                  <span class="info-box-number">{{$forms->count()}}</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                      <span class="progress-description">
                        0% Increase in 30 Days
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div><hr>
          <h3>Departments</h3>
                  <div class="row jumbotron" style="padding: 3%;">


                            @foreach ($departments as $department)
                            
                            <div class="col-lg-3 col-xs-12">
                              <!-- small box -->
                              <div class="small-box bg-aqua">
                                <div class="inner">
                                  <h4 class="text-center">{{$department->name}}</h4><hr>
                                <p class="text-center">
                                  <strong>Forms : </strong>{{$department->forms->count()}}. 
                                  <strong>Users : </strong>{{$department->users->count()}}
                                </p>
                                </div>
                                <a href="{{ action('DepartmentsController@show_dpt', $department->id) }}" class="small-box-footer">
                                  Next <i class="fa fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>

                            @endforeach
                          </select>

                  </div>

                </div>
            </div>
        </div>
    </div>
@endsection
