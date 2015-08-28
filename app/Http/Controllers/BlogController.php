<?php

namespace Rozee\Http\Controllers;

use Illuminate\Http\Request;

use Rozee\Http\Requests;
use Rozee\Http\Controllers\Controller;
use Rozee\Data\Models\Blog;
use Rozee\Data\Models\User;
use Rozee\Data\Models\BlogComment;
use \View;
use Validator, Input, Redirect,Session; 

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Session::has('user'))
        {
            $user=Session::get('user','id');
            $userId=$user->id;            
            return view::make('InsertBlog')->with('userId',$userId);
        }
        else
        {   
        Session::flash('message','Please login or signup first');             
        return Redirect::to('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {

        $rules=array(
            'title'=> 'Required',
            'short_description'=> 'Required:max:200',
            'description'=> 'Required|max:1000');
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else
        {                  
            $blog=new Blog;
            $blog->title = Input::get('title');
            $blog->short_description = Input::get('short_description');
            $blog->description = Input::get('description');
            $blog->user_id = Input::get('userId');
            $blog->save();
            Session::flash('message', 'Blog posted successfully!!');
             return Redirect::to('blogs/blogbyuser/'.$blog->id); 
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showAllblogs()
    {

        $blogs = Blog::orderby('created_at','dec')->Paginate(10);
        $blogs->setPath('blogs');

        if($blogs==null)
        {
            Session::flash('message','No Blogs found');

        }


        return view::make('showblogs')->with('blogs',$blogs);
    }

     public function blogbyuser($id)
    {
        $blog=Blog::where('id','=',$id)->first();
        $comment = $blog->comments;
        return view::make('blogbyuser')->with('blog',$blog)->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);

        return View::make('editblog')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
            $rules=array(
            'title'=> 'Required',
            'short_description'=> 'Required:max:200',
            'description'=> 'Required|max:1000');
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            if(isset($_GET['update']))
            {       
                $blog = Blog::find($id);
                $blog->title = Input::get('title');
                $blog->short_description = Input::get('short_description');
                $blog->description = Input::get('description');               
                $blog->save();

                Session::flash('message', 'Updated blog successfully!!');
                 return Redirect::to('blogs/blogbyuser/'.$blog->id);
                }  
            
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $blog->delete();

        Session::flash('message', 'Successfully deleted the blog!');
        return Redirect::to('blogs');

        //
    }
}
