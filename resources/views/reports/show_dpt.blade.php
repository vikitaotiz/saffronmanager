@extends('layouts.app')

@section('content')

<div class="panel panel-success">
  <div class="panel-heading">
         <div class="row">
               <div class="col-md-4">
                  <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
               </div>
                <div class="col-md-4">
                   <strong>{{$department->name}}</strong>
                </div>
                <div class="col-md-4">
                   {{-- <a href="{{route('notes.create')}}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New note</a> --}}
             </div>
         </div>
  </div>


<div class="panel-body">
                    <h4>Department Forms</h4>
    <div class="row jumbotron">

                   @if ($forms->count() > 0)
                      @foreach ($forms as $form)

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-green">
                                {{$form->submissions->count() ?? '0'}}
                              {{-- <i class="fa fa-file"></i> --}}

                            </span>

                            <div class="info-box-content">
                              <span class="info-box-text">{{$form->name}}</span><br>
                              <span class="info-box-number">
                                {{-- <a href="{{ action('DepartmentsController@show_form', $form->id) }}" class="btn btn-sm btn-default btn-block">  --}}
                                <a href="{{ route('formbuilder::forms.submissions.index', $form) }}" class="btn btn-sm btn-default btn-block">
                                    <i class="fa fa-arrow-right"></i>  Next</a></span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>

                        @endforeach
                   @else
                        There are no forms
                   @endif
    </div>
              <br>

                <h4>Department Users</h4>
    <div class="row jumbotron">
                @if ($users->count() > 0)
                @foreach ($users as $user)
                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username">{{$user->name}}</h3>
                      <h5 class="widget-user-desc">{{$user->role->title}}</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="{{asset('images/user.png')}}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class=" border-right">
                          <div class="description-block">
                            <h5 class="description-header">{{$user->submissions->count()}}</h5>

                            <span class="description-text">
                                <a href="{{ route('formbuilder::submissions.user_subs', $user->id) }}">
                                    Form Submissions</a>
                            </span>

                          </div>
                          <!-- /.description-block -->
                        </div>


                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>


                      @endforeach
                  @else
                    There are no usersu
                @endif
    </div>
           </div>
        </div>
    </div>
  </div>
@endsection
