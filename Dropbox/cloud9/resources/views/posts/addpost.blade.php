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
                    
                    <form action="{{ route('postcreate') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" id="title" value="" class="form-control">
                        </div>
                        
                        <div class="form-group">
                          <label for="content">Post Content:</label>
                          <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary">Back</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
