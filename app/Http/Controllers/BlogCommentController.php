<?php

namespace Rozee\Http\Controllers;

use Illuminate\Http\Request;

use Rozee\Http\Requests;
use Rozee\Http\Controllers\Controller;
use Rozee\Data\Models\BlogComment;
use Rozee\Data\Models\User;
use \View;
use Validator, Input, Redirect,Session; 


class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {

        $rules=array('comment'=>'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) 
        {

            return back()->withInput()
                ->withErrors($validator);

        }
        else
        {
           
            $blog_id=Input::get('blog_id');         
            $comment = new BlogComment;
            $comment->comment       = Input::get('comment');
            $comment->user_id       = Input::get('user_id');
            $comment->blog_id       = Input::get('blog_id');
            $comment->save();
                Session::flash('message1', 'Thanks for your feed back!');             

                return Redirect::to('blogs/blogbyuser/'.$blog_id);


            } 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $comment=BlogComment::find($id);
        $comment->delete();
       

        Session::flash('message1', 'Comment Deleted!');
        return back();
        
    }
}
