@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <a href="{{action('MessagesController@index')}}" class="btn btn-primary btn-sm btn-block">Back To Messages</a>
            </div>
            <div class="col-sm-6">
                <a href="{{action('MessagesController@create')}}" class="btn btn-primary btn-sm btn-block">Create New Message</a>
            </div>
        </div><br>
        <div class="row">
            <div class="panel">
                <div class="panel-header">
                    <h3>{{$department->name}}</h3>
                </div>
                <div class="panel-body">
                        @include('messenger.partials.flash')
                        <h5>Department Conversations ({{App\Department::find($department->id)->threads->count()}}) </h5>
                        @if(count(App\Department::find($department->id)->threads) > 0)
                        <ul class="list-group">
                            @foreach (App\Department::find($department->id)->threads as $thread)
                                <li class="list-group-item">
                                    <a href="{{action('MessagesController@show', $thread->id)}}">{{$thread->subject}}</a>
                                </li>
                            @endforeach
                          </ul>
                        @else
                          There are no department conversations
                        @endif
                       
                </div>
            </div>
        </div>
    </div>
@stop
