<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <span class="navbar-text">
    <ul class="navbar-nav mr-auto">
      @if(Auth::check())   
     <li class="nav-item">
          <a class="nav-link" href="{{url('user/post')}}">Add Post</a>
     </li>
     <li class="nav-item">
          <a class="nav-link" href="{{url('user/logout')}}">Logout</a>
     </li>
     @else
     <li class="nav-item">
          <a class="nav-link" href="{{url('user/login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('user/register')}}">Sign Up</a>
        </li>
        @endif
    </ul>
    </span>
  </div>
</nav>
    </header>