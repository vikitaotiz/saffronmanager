@extends('layouts.app')

@section('content')
<div class="panel panel-success">
        <div class="panel-heading">
              <div class="row">
                <div class="col-md-4">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                </div>
                <div class="col-md-4">
                    <strong>Create New Department</strong>
                </div>
                <div class="col-md-4">
                    {{-- <a href="{{ action('DepartmentsController@create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New client</a> --}}
                </div>
            </div>
        </div>
      
        <div class="panel-body">
                    <form action="{{action('DepartmentsController@store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Department Name">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Enter Department's Description"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Create New Department" class="btn btn-sm btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
