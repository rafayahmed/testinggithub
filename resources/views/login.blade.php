<!-- app/views/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script>
        $(document).ready(function() {

                      
        });
      </script>
</head>

        <style>    
         
            body {
                background-color: #a1bad1;      
            }
        </style>
<body>  


<div class="container">

@if(Session::has('user'))
   <?php $user=Session::get('user');
    $userId=$user->id;
     if($userId==1){?>

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('user') }}">User Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user') }}">View All users</a></li>
        <li><a href="{{ URL::to('user/create') }}">Create a User</a>
    </ul>
</nav> 

<?php } ?>
@endif
<h1>User Login</h1>
{!! Form::open(array('id'=>'login', 'url' => 'login','method'=>'post' )) !!}
{!! HTML::ul($errors->all()) !!}

 	@if (Session::has('message'))
    	<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif


<!-- if there are login errors, show them here -->


 <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Input::old('email'), array('class' => 'form-control')) !!}
    </div>

<div class-"form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',array('class' => 'form-control')) !!}
</div><br>


 {!! Form::submit('Login', array('name'=>'login', 'class' => 'btn btn-primary')) !!} &nbsp;
 <button class="btn btn-primary" type="button" onclick="window.location='{!! url("user/create") !!}'">SignUp</button>&nbsp;
  <button class="btn btn-info" name="back" type="button" onclick="window.location='{!! url("blogs") !!}'">Back</button>
  <h4 align="left" style="font-family:Times New Roman",>{!! HTML::link('login','Forgot password') !!}</h4>


{!! Form::close() !!}

<!-- if there are creation errors, they will show here -->




</div>
</body>
</html>