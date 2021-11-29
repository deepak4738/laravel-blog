@extends('users.login_layouts.master')
@section('content')

<div class="login-box">
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
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>

      <form action="{{ route('loginUser') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="hidden" name="redirect_to" value="{{ $redirect_to }}" >
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <p class="mb-1">
                <a href="{{ route('forgotPassword') }}">Forgot Password</a>
              </p>
              <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register</a>
              </p>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection