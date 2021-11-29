@extends('users.dashboard.dashboard')
@section('content')
@section('title','Change Password')


<section class="content">
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
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" style="margin-left:15%;">
            <h1>Change Password</h1>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <form action="{{url('user/update/password')}}" method="post">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password">
                        @error('old_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password">
                        @error('new_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" class="form-control" id="c_password" placeholder="Confirm Password" name="c_password">
                        @error('c_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div> 
</section>   
    @endsection