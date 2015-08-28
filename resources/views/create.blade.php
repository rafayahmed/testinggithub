<!-- app/views/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script>
        $(document).ready(function() {

                       $('#country_id').on('change',function(){
                            $('#create-user').submit();
                        });
                        $('#state_id').on('change',function() {
                            $('#create-user').submit();
                       });
        });
      </script>
      <style> 
            body {
                background-color: #a1bad1;      
            }
        </style>
</head>
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
<h1>Create a User</h1>

<!-- if there are creation errors, they will show here -->
<?php
    if(Input::has('create-user')) 
    {
        echo HTML::ul($errors->all()); 
    }
?>


{!! Form::open(array('id'=>'create-user', 'url' => 'user/create','method'=>'post' )) !!}


    <div class="form-group"> 
   {!! Form::label('first_name', 'First name') !!}
        {!! Form::text('first_name', Input::get('first_name'), array('class' => 'form-control')) !!} 
    </div>                              

    <div class="form-group">
        {!! Form::label('last_name', 'last Name') !!}
        {!! Form::text('last_name', Input::get('last_name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mid_name', 'Mid Name') !!}
        {!! Form::text('mid_name', Input::get('mid_name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Input::get('email'), array('class' => 'form-control')) !!}
    </div>

      <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password' , array('class' => 'form-control')) !!}
    </div>

     <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('country_id', 'Country') !!}
        {!! Form::select('country_id', $countries, Input::get('country_id',$countryId) , array('class' => 'form-control')) !!}

    </div>

    <div class="form-group">
        {!! Form::label('state_id', 'State') !!}
        {!! Form::select('state_id', $state, Input::get('state_id',isset($state)? $state:'N/A') ,array('class' => 'form-control')) !!}
    </div>
    

    <div class="form-group">
        {!! Form::label('city_id', 'City') !!}
        {!! Form::select('city_id', $cities, isset($cities)? $cities:'N/A' , array('class' => 'form-control')) !!}
        
    </div>

    <div class="form-group">
        {!! Form::label('office_no', 'Office#') !!}
        {!! Form::text('office_no', Input::get('office_no'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mobile_no', 'Mobile#') !!}
        {!! Form::text('mobile_no', Input::get('mobile_no'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('gender', 'Gender') !!}
        {!! Form::text('gender', Input::get('gender'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dob', 'Date Of Birth') !!}
        {!! Form::text('dob', Input::get('dob'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Create the User!', array('name'=>'create-user', 'class' => 'btn btn-primary')) !!}
    {!! Form::reset('Reset', array('class' => 'btn btn-primary')) !!}
  
{!! Form::close() !!}

</div>
</body>
</html>