@extends('layouts.app')

@section('content')
        <div class="row" style="padding: 1%;">
            <div class="col-sm-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{action('MessagesController@index')}}">Messages</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{action('MessagesController@create')}}">Create New Message</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-8 panel">
                            <h1>Create a new message</h1>
                            <form action="{{ action('MessagesController@store') }}" method="post">
                                {{ csrf_field() }}
                                <div>
                                    <div class="form-group">
                                        <label>Select Department</label>
                                        <select name="department_id" id="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Subject Form Input -->
                                    <div class="form-group">
                                        <label class="control-label">Subject</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                               value="{{ old('subject') }}">
                                    </div>
                        
                                    <!-- Message Form Input -->
                                    <div class="form-group">
                                        <label class="control-label">Message</label>
                                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                    </div>
                        
                                    @if($users->count() > 0)
                                        <div class="checkbox">
                                            @foreach($users as $user)
                                                <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                                        value="{{ $user->id }}">{!!$user->name!!}</label>
                                            @endforeach
                                        </div>
                                    @endif
                            
                                    <!-- Submit Form Input -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                                    </div>
                                </div>
                            </form>
            </div>
        </div>
    
@stop
