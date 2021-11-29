@extends('frontend.layouts.master')
@section('content')
<main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">All Posts</h1>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @foreach($postList as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text={{$post->title}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">{{$post->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{route('postDetails', $post->id)}}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </a>
                    @if(Auth::check() && Auth::user()->id == $post->user_id)
                      <a href="{{route('user.postEdit', $post->id)}}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                      </a>
                    @endif
                    <a href="javascrip:void(0);" class="btn btn-sm btn-outline-secondary">Comments <span class="badge badge-light">{{$post->comments_count}}</span></a>
                    </div>
                    <small class="text-muted">{{$post->date}}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
          {!! $postList->links('pagination.default') !!}
        </div>
        
      </div>
    </main>
    
@endsection