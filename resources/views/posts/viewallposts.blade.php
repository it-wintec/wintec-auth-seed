@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="list-unstyled list-inline mb-0">
                        <li class="list-inline-item"><a href="/postwelcome">welcome</a></li>
                        <li class="list-inline-item"><a href="/addpost">Add Post</a></li>
                        <li class="list-inline-item"><a href="/viewallposts">View All Posts</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  <table class="table table-striped">
                      <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th colspan="3" class="text-center">Operation</th>
                      </tr>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->title}}</td>
                      <td>{{$post->content}}</td>
                      <td><a href="/viewonepost?id={{$post->id}}">View</a></td>
                      <td><a href="/updateonepost?id={{$post->id}}">Update</a></td>
                      <td><a href="/post/delete?id={{$post->id}}">Delete</a></td>
                    </tr>
                    	@endforeach
                  </table>
          
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
