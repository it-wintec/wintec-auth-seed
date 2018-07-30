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
          .toplink{text-align:center;}
        </style>
    </head>
    <body>
      <div class="toplink">
          <a href="welcome">Back Welcome</a>
          <div>
             
             <ul class="list-unstyled">
				@foreach($posts as $post)
					<li> {{$post}} </li> 
				@endforeach
			 </ul>

          </div>
      </div>
    </body>
</html>
