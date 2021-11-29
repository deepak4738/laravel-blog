@extends('users.dashboard.dashboard')
@section('content')
@section('title','Post List')

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
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Post List</h3>

         
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          Id
                      </th>
                      <th style="width: 15%">
                          Title
                      </th>
                      <th style="width: 20%">
                          Author
                      </th>
                      <th>
                          Date
                      </th>
                      <th style="width: 15%">
                          Tags
                      </th>
                      <th style="width: 15%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($postList as $list)
                  <tr>
                      <td>
                          {{$list->id}}
                      </td>
                      <td>
                          {{$list->title}}
                      </td>
                      <td>
                      {{$list->author}}
                      </td>
                      <td >
                      {{$list->date}}
                      </td>
                      <td >
                      {{$list->tags}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{route('user.postEdit', $list->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('user.deletePost', $list->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr> 
                  @endforeach 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {!! $postList->links('pagination.default') !!}
    </section>  
  @endsection