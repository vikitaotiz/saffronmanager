@extends('layouts.app')

@section('content')

        <div class="row" style="padding:1%;">
                <div class="col-sm-6">
                    <a href="{{action('MessagesController@index')}}" class="btn btn-primary btn-sm btn-block">Back To Messages</a>
                </div>
                <div class="col-sm-6">
                    <a href="{{action('MessagesController@create')}}" class="btn btn-primary btn-sm btn-block">Create New Message</a>
                </div>
            </div><br>

    <div class="row" style="padding:2%;">


                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="box box-primary direct-chat direct-chat-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">{{ $thread->subject }} </h3>
          
                        <div class="box-tools pull-right">

                          <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
                            <small>
                            
                                {{App\Department::find($thread->department_id)->name ?? 'N/A'}}
                       
                            </small>
                        </div>


                      </div>

                      @each('messenger.partials.messages', $thread->messages, 'message')

                      <!-- /.box-body -->
                      @include('messenger.partials.form-message')
                      <!-- /.box-footer-->
                    </div>
                   

        {{-- <div class="panel"> --}}
            {{-- <div class="panel-heading">
                <h1>{{ $thread->subject }}</h1>
                <small>
                    @if($thread->department_id)
                        {{App\Department::find($thread->department_id)['name']}}
                    @else
                        No Department
                    @endif
                </small><hr>
            </div> --}}
             {{-- <div  class="col-sm-12 panel-body"> --}}
                {{-- @each('messenger.partials.messages', $thread->messages, 'message') --}}
                {{-- @include('messenger.partials.form-message') --}}
            {{-- </div> --}}
        {{-- </div> --}}
   </div>
@stop

