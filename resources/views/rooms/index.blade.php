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
                            <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New Room</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                        @if(count($rooms) > 0)
                        <table class="table table-bordered" id="clients_table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Room Number</th>
                                    <th>Created On</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($rooms as $room)
                                        <tr>
                                        <td>{{$room->id}}</td>
                                        <td>{{$room->room_number}}</td>
                                        <td>{{$room->created_at->format('D, M j, Y g:i A')}}</td>
                                        <td>{{App\User::find($room->user_id)->name}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{route('admin.rooms.show', $room->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> View</a>
                                                </div>
                                                <div class="col-md-8">
                                                    <form action="{{route('admin.rooms.destroy', $room->id)}}" method="POST">
                                                        {{csrf_field()}}{{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    @else
                        <h4>There are no clients</h4>
                    @endif
                </div>
            </div>

@endsection
