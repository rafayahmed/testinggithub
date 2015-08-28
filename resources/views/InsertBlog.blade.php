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


    
<h1>Create New Blog</h1>

{!! Form::open(array( 'url' => 'blog/store','method'=>'get' )) !!}
{!! HTML::ul($errors->all()) !!}
 	

 <div class="form-group"> 
   {!! Form::label('title', 'Title ') !!} 
        {!! Form::text('title', Input::get('title'), array('class' => 'form-control')) !!} 
    </div>   

    <div class="form-group"> 
   {!! Form::label('short_description', 'Short Description') !!}&nbsp; (Max length 200)
        {!! Form::textarea('short_description', Input::get('short_description'), array('size' => '30x4','class' => 'form-control')) !!} 
    </div> 

     <div class="form-group"> 
   {!! Form::label('description', 'Description') !!}&nbsp; (Max length 1000)
        {!! Form::textarea('description', Input::get('description'), array('class' => 'form-control')) !!} 
    </div>  
    <input type="hidden" name="userId" value="{{ $userId}}">
 {!! Form::submit('Post', array('name'=>'create', 'class' => 'btn btn-primary')) !!} 
 <button class="btn btn-primary" type="button" onclick="window.location='{!! url("blogs") !!}'">Cancel</button>
 
{!! Form::close() !!}


</div>
</body>
</html>