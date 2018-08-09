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
                    <dl>
                        <dd> Post Title:</dd> <dt class="mb-5"> {{ $post->title }} </dt>
                        <dd> Post Content:</dd><dt> {{ $post->content }} </dt>
                    </dl>
                    
                    
           
                    
                    
                    {!! Form::open(['url' => '/updateonepost']) !!}
                    
                    <div class="form-group">
                    {!! Form::label('title', 'title'); !!}
                    {!! Form::text('title', $post->title); !!}
                     </div>
                    
                    <div class="form-group">
                    {!! Form::label('content', 'content'); !!}
                    {!! Form::textarea('content', $post->content); !!}
                    </div>
                    
                    <div class="form-group">
                    {!! Form::submit('Update Post');  !!}
                    </div>
                    
                    {!! Form::hidden('id', $post->id); !!}
                    
                    {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
