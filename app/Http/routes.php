<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('hello', function () {
    return 'Hello ' . Request::input('name');
});

Route::any('check', 'UserController@check');
Route::any('welcome', 'UserController@welcome');
Route::get('contact', 'UserController@contact');
Route::get('contact/feedback', 'UserController@contact');
Route::any('/', array('uses' => 'BlogController@showAllblogs'));
Route::get('user', ['uses'=>'UserController@index']);
Route::get('user/index', ['uses'=>'UserController@index']);
Route::any('user/create',['uses'=>'UserController@create']);
Route::any('user/edit/{id}',['uses'=>'UserController@edit']);
Route::get('user/{id}',['uses'=>'UserController@show']);
Route::any('user/updated/{id}',['uses'=>'UserController@update']);
Route::post('user/store',['uses'=>'UserController@store']);
Route::delete('user/delete/{id}',['uses'=>'UserController@destroy']);
Route::any('login', ['uses'=>'UserController@login']);
Route::get('logout', array('uses' => 'UserController@logout'));
Route::get('blog/create', array('uses' => 'BlogController@create'));
Route::get('blog/store', array('uses' => 'BlogController@store'));
Route::get('blogs', array('uses' => 'BlogController@showAllblogs'));
Route::get('blogs/blogbyuser/{id}', array('uses' => 'BlogController@blogbyuser'));
Route::get('blog/blogdeleted/{id}', array('uses' => 'BlogController@destroy'));
Route::get('blog/blogedit/{id}', array('uses' => 'BlogController@edit'));
Route::get('blog/blogupdate/{id}', array('uses' => 'BlogController@update'));
Route::get('blogcomment', array('uses' => 'BlogCommentController@store'));
Route::get('blogcomment/delete/{id}', array('uses' => 'BlogCommentController@destroy'));






