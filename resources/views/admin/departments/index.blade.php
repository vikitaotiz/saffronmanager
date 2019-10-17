@extends('layouts.app')

@section('content')

<div class="panel panel-success">
  <div class="panel-heading">
        <div class="row">
          <div class="col-md-4">
              <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
          </div>
          <div class="col-md-4">
              <strong>Departments</strong>
          </div>
          <div class="col-md-4">
              <a href="{{ action('DepartmentsController@create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New client</a>
          </div>
      </div>
  </div>

  <div class="panel-body">
                  
                    <div class="row">
                      @if (count($departments) > 0)
                       @foreach ($departments as $department)


                       <div class="col-lg-3 col-md-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h4>{{$department->name}}</h4>
                     
                              <p>{{$department->name}}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tasks nav-icon"></i>
                            </div>
                            <a href="{{ action('DepartmentsController@show', $department->id) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>


                       {{-- <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h4><b>{{$department->name}}</b></h4>
              
                              <p>{{$department->name}}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tasks nav-icon"></i>
                            </div>
                          </div>
                        </div> --}}
                       @endforeach
                      @else
                          <p class="text-danger text-center" >No Departments Created Yet</p>
                      @endif
                                
                        <!-- ./col -->
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
