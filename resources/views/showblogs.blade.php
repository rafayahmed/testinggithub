<!-- app/views/showblogs.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>rozeePk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
 <style>    
         
                    body{
                         background-color: #a1bad1;      
                        }
                    hr { 
                        display: block;
                        margin-top: 0.5em;
                        margin-bottom: 0.5em;
                        margin-left: auto;
                        margin-right: auto;
                        border-style: inset;
                        border-width: 1px;
                        }
                    hr2 { 
                        display: block;
                        margin-top: 0.5em;
                        margin-bottom: 0.5em;
                        margin-left: auto;
                        margin-right: auto;
                        border-style: inset;
                        border-width: 2px;
                        }                     
</style>
<body>
<div class="container">

    <h1>All Blogs</strong></h1><br>
    <h3 align="right">{!! HTML::link('blog/create','Post new blog',array('class'=>'btn btn-success')) !!}</h3>
    @if (Session::has('user'))
    <?php $user = Session::get('user'); ?>
        @if($user->id==1)
        <p><h4 align="right">{!! HTML::link('user',' Admin Panel') !!}</h4></p>
        @endif   
    <p align="right">Signed in as <b>{!! $user->email !!}</b> | {!! HTML::link('logout','logout')!!}</p>
    <p align="right">Visit Profile: <b>{!! HTML::link('user/'.$user->id,$user->first_name)!!}</b> </p>
    @else
    <p><h5 align="right">{!! HTML::link('login',' Login') !!} | 
    {!! HTML::link('user/create',' SignUp') !!}</h5></p>
    
    @endif
    <h2 align="right">{!! HTML::link('contact','Feedback',array('class'=>'btn btn-info')) !!}</h3>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    
    @foreach($blogs as $key => $value)    
        <a href="blogs/blogbyuser/{{$value->id}}"><h3>{{ $value->title }}</h3></a> <hr>   
        <h4> {{ $value->short_description }}</h4><br>
        <input type="hidden" name="blogid" value="{{$value->id}}">         
    @endforeach  
    {!! $blogs->render() !!}

</div>



</body>
</html>