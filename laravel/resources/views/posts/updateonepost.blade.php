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
                    <!--<dl>-->
                    <!--    <dd> Post Title:</dd> <dt class="mb-5"> {{ $post->title }} </dt>-->
                    <!--    <dd> Post Content:</dd><dt> {{ $post->content }} </dt>-->
                    <!--</dl>-->
                
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
           
                    
                    {!! Form::open(['url' => '/updateonepost']) !!}
                    
                    <div class="form-group">
                    {!! Form::label('title', 'Post Title'); !!}
                    {!! Form::text('title', $post->title, array_merge(['class' => 'form-control'])); !!}
                     </div>
                    
                    <div class="form-group">
                    {!! Form::label('content', 'Post Content'); !!}
                    {!! Form::textarea('content', $post->content, array_merge(['class' => 'form-control'])); !!}
                    </div>
                    
                    <div class="form-group">
                    {!! Form::submit('Update Post', array_merge(['class' => 'btn btn-primary']));  !!}
                    </div>
                    
                    {!! Form::hidden('id', $post->id); !!}
                    
                    {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
