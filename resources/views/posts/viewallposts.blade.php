<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COMP710 Ayesha Jack</title>

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       
        <style>
          
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-sm bg-light">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="welcome">Welcome</a></li>
          <li class="nav-item"><a class="nav-link" href="viewallposts">All Posts</a></li>
        </ul>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col">
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
    </body>
</html>
