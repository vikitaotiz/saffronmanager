@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>All Clients</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New client</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                        @if(count($clients) > 0)
                        <table class="table table-bordered" id="clients_table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($clients as $client)
                                        <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->firstname}} {{$client->lastname}}</td>
                                        <td>{{$client->company_name}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->created_at->diffForHumans()}}</td>
                                        {{-- <td>{{App\User::find($client->user_id)->name}}</td> --}}
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{route('admin.clients.show', $client->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> View</a>
                                                </div>
                                                <div class="col-md-8">
                                                    <form action="{{route('admin.clients.destroy', $client->id)}}" method="POST">
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
