@extends('layouts.auth')

@section('content')
<style>

body {
    background-color: #D2D6DE;
}

</style>
    <div class="row">

            <div class="login-box">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="login-logo">
                      <a href="#"><b>Embassy</b>Hotel</a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                      <p class="login-box-msg">Sign in to start your session</p>
                  
                      <form role="form" method="POST" action="{{ url('login') }}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group has-feedback">
                          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox" style="margin-left: 1%;">
                                        <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                </div>
                            </div>
                        
                          <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                          </div>
                          <!-- /.col -->
                        </div>

                        <a href="{{ route('auth.password.reset') }}">@lang('quickadmin.qa_forgot_password')</a>

                      </form>

                      {{-- <div class="social-auth-links text-center">
                          <p>- OR -</p>
                          <a href="{{action('Auth\LoginController@redirectToProvider')}}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                        </div> --}}
                              
                    </div>
                    <!-- /.login-box-body -->
                  </div>
        
            </div>
        </div>
    </div>
@endsection