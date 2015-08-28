<!-- app/views/insertBlog.blade.php -->

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


    
<h1>Please give us your feedback</h1>

{!! Form::open(array( 'url' => 'contact/feedback','method'=>'get' )) !!}
{!! HTML::ul($errors->all()) !!}
 	

 <div class="form-group"> 
   {!! Form::label('user_name', 'Name ') !!} 
        {!! Form::text('user_name', Input::get('user_name'), array('class' => 'form-control')) !!} 
    </div>   

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Input::get('email'), array('class' => 'form-control')) !!}
    </div>

<div class="form-group"> 
   {!! Form::label('subject', 'Subject ') !!} 
        {!! Form::text('subject', Input::get('subject'), array('class' => 'form-control')) !!} 
    </div>   
    

     <div class="form-group"> 
   {!! Form::label('message', 'Message') !!}&nbsp; (Max length 200)
        {!! Form::textarea('message', Input::get('message'), array('class' => 'form-control')) !!} 
    </div>  
    
 {!! Form::submit('Send', array('name'=>'send', 'class' => 'btn btn-primary')) !!} 
 <button class="btn btn-primary" type="button" onclick="window.location='{!! url("blogs") !!}'">Cancel</button>
 
{!! Form::close() !!}


</div>
</body>
</html>