@extends('users.dashboard.dashboard')
@section('content')
@section('title','Edit Post')

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
            <h1>Edit Post</h1>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Post</h3>
                </div>
                <form action="{{route('user.updatePost')}}" method="post">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$postData->id}}">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value=" {{$postData->title}}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Author" name="author" value=" {{$postData->author}}">
                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" value="{{$postData->tags}}" data-role="tagsinput" id="tags" class="form-control" name="tags" > 
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="4" cols="50">{{$postData->description}}
                        </textarea>
                        @error('description')
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
<script>
$(document).ready(function(){
    $('input[name="tags"]').tagsinput({
       trimValue:true,
       confirmKeys:[44],
       focusClass:""
    });
});
</script> 
    @endsection