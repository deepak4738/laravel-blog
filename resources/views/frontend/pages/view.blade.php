@extends('frontend.layouts.master')
@section('content')
<main class="container">
  <div class="bg-light p-5 rounded mt-3">
    <h1>{{$post->title}}</h1>
    <p class="lead">{{$post->description}}</p>
  </div>
</main>
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                <h4>Comments</h4>
                @foreach($post->comments as $comment)
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{url('images/user.jpg')}}" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$comment->comment}}</span><span class="date text-black-50">Shared publicly - {{ date('j F, Y', strtotime($comment->created_at)) }}</span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">{{$comment->comment}}</p>
                    </div>
                </div>
                @endforeach
                @if(Auth::check())
                    <div class="bg-light p-2">
                        <form action="{{route('addComment', $post->id)}}" method="post" id="comments">
                            @csrf
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{url('images/user.jpg')}}" width="40">
                                <textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea>
                            </div>
                            <div class="mt-2 text-right">
                                <button type="submit" id="submit" class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button>
                                <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                        </form>
                    </div>
                @else
                <a href="{{route('login', ['post' => $post->id])}}" id="submit" class="btn btn-primary btn-sm shadow-none" type="button">
                    Login for Comment
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection