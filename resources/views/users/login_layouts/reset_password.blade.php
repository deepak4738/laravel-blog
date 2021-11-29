@extends('users.login_layouts.master')
@section('content')

<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form action="{{ route('resetPasswordToken') }}" method="post">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            </div>
          </div>
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            </div>
          </div>
          @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
          @endif
          <div class="row">
            <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
            </div>
          </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection