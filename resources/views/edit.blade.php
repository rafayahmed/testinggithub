<!-- app/views/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script>
        $(document).ready(function() {

                       $('#country_id').on('change',function(){
                            $('#edit-user').submit();
                        });
                        $('#state_id').on('change',function() {
                            $('#edit-user').submit();
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

<h1>Edit {!! $user->first_name !!}</h1>

{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('id'=>'edit-user','url' => 'user/edit/'. $user->id , 'method' => 'POST')) !!}

    <div class="form-group"> 
   {!! Form::label('first_name', 'First name') !!}
        {!! Form::text('first_name', $user->first_name, array('class' => 'form-control')) !!} 
    </div>


     <div class="form-group">
        {!! Form::label('last_name', 'Last Name') !!}
        {!! Form::text('last_name',$user->last_name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mid_name', 'Mid Name') !!}
        {!! Form::text('mid_name', $user->mid_name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $user->email, array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('country_id', 'Country') !!}
        {!! Form::select('country_id', $countries, $countryId, array('class' => 'form-control')) !!} 
    </div>

     <div class="form-group">
        {!! Form::label('state_id', 'state') !!}
        {!! Form::select('state_id', $state, $stateId , array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city_id', 'City') !!}
        {!! Form::select('city_id', $cities, isset($cityId)? $cityId: 'N/A', array('class' => 'form-control')) !!}
        
    </div>

    <div class="form-group">
        {!! Form::label('office_no', 'Office#') !!}
        {!! Form::text('office_no', $user->office_no, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mobile_no', 'Mobile#') !!}
        {!! Form::text('mobile_no', $user->mobile_no, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('gender', 'Gender') !!}
        {!! Form::text('gender', $user->gender, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dob', 'Date Of Birth') !!}
        {!! Form::text('dob', $user->dob, array('class' => 'form-control')) !!}
    </div>
    
    {!! Form::submit('Edit the User!', array('name'=>'update','class' => 'btn btn-primary')) !!}


{!! Form::close() !!}


</div>
</body>
</html>