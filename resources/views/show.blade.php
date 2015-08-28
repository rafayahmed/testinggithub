<!-- app/views/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<style> 
            body {
                background-color: #a1bad1;      
            }
        </style>
<body>
<div class="container">
@if(Session::has('user'))
   <?php $user1=Session::get('user');
    $userId=$user1->id;
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

<h1>Hello!&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ $user->first_name }}</strong></h1>
<a class="btn btn-small btn-success" href="{{ URL::to('blogs') }}">Home</a>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @if (Session::has('user'))
    <?php $user2 = Session::get('user');          
         if($user2->id==$user->id)
        { ?> 
    <a class="btn btn-small btn-info" href="{{ URL::to('user/edit/' . $user->id  ) }}">Edit this User</a>
             {!! Form::open(array('url' => 'user/delete/' . $user->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this User', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
    </h2>
       
    <?php } ?>
@endif

    <div class="jumbotron text-left">
        <h2>{{ $user->name }}</h2>
        <p>
            <strong>First Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->first_name }}<br>
            <strong>last Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->last_name }}<br>
            <strong>Mid Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->mid_name }}<br>
            <strong>Email:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->email }}<br>
            <strong>Country:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ isset($user->country->name)?$user->country->name:'N/A' }}<br>
            <strong>State:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ isset($user->states->name)?$user->states->name:'N/A' }}<br>
            <strong>City:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ isset($user->city->name)?$user->city->name:'N/A' }}<br>           
            <strong>Office No:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->office_no }}<br>
            <strong>Mobile No:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->mobile_no }}<br>
            <strong>Gender:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->gender }}<br>
            <strong>Date Of Birth:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $user->dob }}<br>
        </p>


       
    </div>

</div>
</body>
</html>