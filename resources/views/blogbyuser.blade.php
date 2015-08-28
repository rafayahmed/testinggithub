<!-- app/views/showblogs.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
   
<script>
    $(document).ready(function() 
    {  
      
                                 
    });

</script>

     <style> 
            body {
                background-color: #a1bad1;      
            }
        </style>
<body>

<div class="container">

<h1>Rozee</strong></h1><br>
<h2>{!!HTML::link('blogs','Back to blogs')!!} </h2>
 @if (Session::has('user'))
    <?php $user = Session::get('user'); ?> 

    <p align="right">Signed in as <b>{!! HTML::link('user/'.$user->id,$user->first_name)!!}</b> | {!! HTML::link('logout','logout')!!}</p>
    @endif
<hr>  
@if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif 
        <h2>{{ $blog->title }}</h2>      
        <p>Posted: &nbsp; <b>{{$blog->created_at}}</b></p>    
        <h4>{{$blog->short_description}}</h4><br>
        <p>{{$blog->description}} </p>

        @if(Session::has('user'))
        <?php $user=session::get('user');
            if($user->id==$blog->user_id|| $user->id==1)
                { ?>

        <a class="btn btn-small btn-info" href="{{ URL::to('blog/blogedit/'. $blog->id  ) }}">Edit</a>
        <a id="del" class="btn btn-small btn-danger" href="{{ URL::to('blog/blogdeleted/' . $blog->id  ) }}">Delete</a>
        <?php }?> @endif


<hr>
        <p>Posted by: <b>{!! HTML::link('user/'.$blog->user->id,$blog->user->first_name) !!}</b></p>
        
       

        <div class="form-group"> 
        {!! Form::label('comment', 'Discussion ') !!} 
        {!! HTML::ul($errors->all()) !!}
         @if (Session::has('message1'))
        <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    @if(Session::has('user'))

    
        {!! Form::open(array( 'url' => 'blogcomment','method'=>'get' )) !!}    
        {!! Form::text('comment', Input::get('comment'), array('class' => 'form-control','placeholder'=>'Add a comment')) !!} 
        {!! Form::hidden('blog_id' , $blog->id) !!}
        {!! Form::hidden('user_id', isset($user->id)?$user->id:0) !!}
        {!! Form::submit('comment', array( 'class' => 'btn btn-primary')) !!}
    @else
        <b>{!! HTML::link('login','For discussion, Please login first') !!}</b>
        @endif
        </div>
        <div>
        @foreach($comment as $key => $value)
        <p style="background-color:lightgrey; font-size: 12pt; "><strong>{!! HTML::link('user/'.$value->user->id,$value->user->first_name) !!}:</strong>&nbsp; {{$value->comment}}</p>
         @if(Session::has('user'))
        <?php $user=session::get('user');
            if($user->id==$value->user_id || $user->id==1)
                { ?>       
         <b><a class="btn btn-danger" href="{{ URL::to('blogcomment/delete/'.$value->id  ) }}">Delete</a></b>
        <?php }?>
        @endif
<hr >

        @endforeach
   
        

      
           
    </div>

</div>
</body>
</html>