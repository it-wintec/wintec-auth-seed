@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
          <table class="table table-striped">
            	@foreach($posts as $post)
            <tr>
              <td>{{$post->title}}</td>
              <td>{{$post->content}}</td>
            </tr>
            	@endforeach
          </table>
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
