@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Create New Room</strong>
                        </div>
                        <div class="col-md-4">
                            <!-- <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New Room</a> -->
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                      <form action="{{route('admin.rooms.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Room Number</label>
                              <input type="number" name="room_number" value="{{old('room_number')}}" placeholder="Enter Room Number" class="form-control">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Floor</label>
                              <input type="text" name="floor" value="{{old('floor')}}" placeholder="Enter Floor" class="form-control">
                            </div>
                          </div>

                        </div>
                        <div class="row" style="padding: 1%;">
                          <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary btn-block" value="Create Room">
                          </div>
                        </div>
                      </form>
                </div>
            </div>

@endsection
