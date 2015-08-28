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


    
<h1>Edit this Blog</h1>

{!! Form::open(array( 'id'=>'update', 'url' => 'blog/blogupdate/'.$blog->id,'method'=>'get' )) !!}
{!! HTML::ul($errors->all()) !!}	

 <div class="form-group"> 
   {!! Form::label('title', 'Title ') !!} 
        {!! Form::text('title', $blog->title, array('class' => 'form-control')) !!} 
    </div>   

    <div class="form-group"> 
   {!! Form::label('short_description', 'Short Description') !!}&nbsp; (Max length 200)
        {!! Form::textarea('short_description', $blog->short_description , array('size' => '30x4','class' => 'form-control')) !!} 
    </div> 

     <div class="form-group"> 
   {!! Form::label('description', 'Description') !!}&nbsp; (Max length 1000)
        {!! Form::textarea('description', $blog->description, array('class' => 'form-control')) !!} 
    </div>  
 
 {!! Form::submit('Update', array('name'=>'update', 'class' => 'btn btn-primary')) !!} 
 <button class="btn btn-primary" type="button" onclick="window.location='{!! url("blogs") !!}'">Cancel</button>
 
{!! Form::close() !!}


</div>
</body>
</html>