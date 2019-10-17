@extends('layouts.app')

@section('content')

            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success">Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Create New Patient</strong>
                        </div>
                        <div class="col-md-4">
                            {{-- <a href="{{route('clients.edit')}}" class="btn btn-sm btn-primary">Edit Client</a> --}}
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                  <form action="{{route('admin.clients.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control" placeholder="Enter First Name...">
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control" placeholder="Enter Last Name...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div><hr>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone Number...">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="Enter Address">
                            </div>
                        </div>

                    </div><hr>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" class="form-control" value="{{old('company_name')}}" placeholder="Enter Company Name...">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Industry</label>
                                <input type="text" name="industry" class="form-control" value="{{old('industry')}}" placeholder="Enter Industry...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Potential Revenue</label>
                                <input type="text" name="revenue_potential" class="form-control" value="{{old('revenue_potential')}}" placeholder="Enter Potential Revenue...">
                            </div>
                        </div>

                    </div>


                    <hr>
                    <div class="row" style="padding: 1%;">
                        <label>More Information</label>
                        <div class="form-group">
                            <textarea name="about" id="about_client" class="form-control" placeholder="Enter More Information">
                              {{old('about')}}
                            </textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="row" style="padding: 1%;">
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success btn-block" value="Submit Client">
                        </div>
                    </div>
                </form>

                </div>
            </div>

@endsection
