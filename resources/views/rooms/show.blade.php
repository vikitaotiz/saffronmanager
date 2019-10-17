@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>All Rooms</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-warning btn-block"><i class="fa fa-pencil"></i> Edit Room</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item"><strong>Room Number : </strong> {{$room->room_number}}</li>
                    <li class="list-group-item"><strong>Floor : </strong> {{$room->floor ?? 'Not Provided'}}</li>
                    <li class="list-group-item"><strong>Created On : </strong> {{$room->created_at}}</li>
                    <li class="list-group-item"><strong>Created By : </strong> {{$room->user_id}}</li>
                  </ul>

                </div>
          </div>
@endsection
