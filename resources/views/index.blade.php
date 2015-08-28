<!-- app/views/index.blade.php -->
<?php// print_r($country);die(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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
        <a class="navbar-brand" href="{{ URL::to('blogs') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user') }}">View All users</a></li>
        <li><a href="{{ URL::to('user/create') }}">Create a User</a></li>
    </ul>
</nav> 

<?php } ?>
@endif
<h1>All the Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))

    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr align="center">
            <td>Id</td>
            <td>First Name</td>
            <td>last Name</td>
            <td>Mid Name</td>
            <td>Email</td>
            <td>Country</td>
            <td>State</td>
            <td>City</td>
            <td>office #</td>
            <td>Mobile #</td>
            <td>Gender</td>
            <td>Date Of Birth</td>
            <td >Actions</td>
        </tr>
    </thead>
    <tbody>
     @foreach($user as $key => $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{ $value->first_name }}</td>
            
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->mid_name }}</td>
            <td>{{ $value->email }}</td>
             <td>{{ isset($value->country->id)? $value->country->name:'N/A' }} </td>
             <td>{{ isset($value->states->id)? $value->states->name:'N/A' }} </td>
             <td>{{ isset($value->city->id)? $value->city->name:'N/A' }} </td>
            <td>{{ $value->office_no }}</td>
            <td>{{ $value->mobile_no }}</td>
             <td>{{ $value->gender }}</td>
            <td>{{ $value->dob }}</td>
            

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the user (uses the destroy method DESTROY /user/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'user/delete/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this User', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

                <!-- show the user (uses the show method found at GET /user/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Show this User</a>

                <!-- edit user user (uses the edit method found at GET /user/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('user/edit/' . $value->id  ) }}">Edit this User</a>

            </td>
        </tr>
    @endforeach


    </tbody>
</table>
{!! $user->render() !!}
<!-- {!! $user->render() !!} -->

</div>
</body>
</html>