@extends('layouts.app')

@section('content')
        
        <div class="row" style="padding:1%;">
                <h4>Public Messages</h4>
            <div class="col-sm-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{action('MessagesController@index')}}">Messages</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{action('MessagesController@create')}}">Create New Message</a>
                    </li>
                </ul>
                <ol class="list-group">
                    <li class="list-group-item" style="text-align: center; color: white; background: #3C8DBC;">
                        <strong>Department Messages</strong>
                    </li>

                    @foreach ($departments as $department)
                        <li class="list-group-item">
                            <a href="{{action('DepartmentMessagesController@show', $department->id)}}">
                                {{$department->name}} <span class="pull-right">({{App\Department::find($department->id)->threads->count()}})</span>
                            </a>
                        </li>  
                    @endforeach
                </ol>
            </div>
            <div class="col-sm-8 panel" style="overflow-y: scroll; height:550px;">
                <div class="panel-body">
                        @include('messenger.partials.flash')
                        <h3>All Message Threads</h3><hr>
                        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads') <br>
                </div>
            </div>
        </div>
    
@stop
