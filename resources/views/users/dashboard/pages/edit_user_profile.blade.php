@extends('users.dashboard.dashboard')
@section('content')
@section('title','Edit Profile')

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
            <h1>Edit User Profile</h1>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User Profile</h3>
                </div>
                <form action="{{url('user/update/profile')}}" method="post">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$user->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{$user->email}}">
                        @error('email')
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