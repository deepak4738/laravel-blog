
@extends('users.login_layouts.master')
@section('content')
<div class="register-box">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
     <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><strong>Register</strong></p>
      <form action="{{ route('registerPost') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('name', '<p class="help-block ">:message</p>') !!}
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="c_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('c_password', '<p class="help-block">:message</p>') !!}
        <div class="row">
          <div class="col-8">
              <label for="agreeTerms">
              <a href="{{ route('login') }}" class="text-center">Login</a>
              </label>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection