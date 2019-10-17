@extends('layouts.app')

@section('content')

<div class="panel panel-success">
    <div class="panel-heading">
          <div class="row">
            <div class="col-md-3">
                <strong>{{$department->name}} Department</strong>
            </div>
            <div class="col-md-3">
                <a href="{{ route('formbuilder::forms.create') }}" class="btn btn-sm btn-success">Create New Form</a>
            </div>
            <div class="col-md-3">
                <a href="{{ action('DepartmentsController@edit', $department->id) }}" class="btn btn-sm btn-info">Edit Department</a>
            </div>
            <div class="col-md-3">
                <form action="{{action('DepartmentsController@destroy', $department->id)}}" method="post">
                  {{csrf_field()}} {{method_field('DELETE')}}
                  <input type="submit" class="form-control" class="btn btn-sm btn-danger" value="Remove Department" onclick="return confirm('Are you sure?')">
                </form>
            </div>
        </div>
    </div>
                  <div class="panel panel-body">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                            </div>
                          
                          <div class="col-md-6">
                            <strong>Description.</strong>
                          </div>
                        </div><hr>

                        <p>{{$department->description}}</p><br>
                        <h5>Department Conversations ({{App\Department::find($department->id)->threads->count()}}) </h5>
                        @if(count(App\Department::find($department->id)->threads) > 0)
                        <ul class="list-group">
                            @foreach (App\Department::find($department->id)->threads as $thread)
                                <li class="list-group-item">
                                 <a href="{{ action('MessagesController@show', $thread->id) }}"> {{$thread->subject}}</a>
                                </li>
                            @endforeach
                          </ul>
                        @else
                          There are no department conversations
                        @endif
                          
                      </div>
                      <div class="col-md-6">
                        <h4>Members.</h4><hr>
                        @foreach($users as $member)
                         <ol  class="list-group">
                          <li class="list-group-item"><a href="{{ route('admin.users.show', $member->id) }}">{{$member->name}}</a></li>
                        </ol>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="panel-body">
                    @if(App\Department::find($department->id)->forms->count())
                    <h4 style="border-bottom: 3px solid #2e2e1f; text-align:center; ">Forms</h4><hr>
                       @foreach(App\Department::find($department->id)->forms as $form)

                       <div class="col-lg-3 col-md-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4>{{ $form->name }}</h4>
                     
                                <p>{{ $form->name }}</p>

                            </div>
                            <div class="icon">
                              <i class="fa fa-tasks nav-icon"></i>
                            </div>
                            <a href="{{ route('formbuilder::forms.show', $form) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                       @endforeach
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="text-danger text-center">
                                No form available.
                            </h4>
                        </div>
                    @endif

                </div>
            </div>
        </div>

@endsection
