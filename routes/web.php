<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

//Home
Route::get('/', 'HomeController@getIndex');
Route::get('home', 'HomeController@getIndex');

//usuarios
Route::get('/myuser', 'MyUserController@getIndex')->middleware('auth')->middleware('verified');
Route::post('/myuser', 'MyUserController@update')->middleware('auth')->middleware('verified');
Route::post('/myuser/img', 'MyUserController@updateimage')->middleware('auth')->middleware('verified');
Route::post('/myuser/pass', 'MyUserController@updatePassword')->middleware('auth')->middleware('verified');
Route::get('/myuser/pass', 'MyUserController@getIndex')->middleware('auth')->middleware('verified');
Route::get('/viewusers', 'MyUserController@getviewusers')->middleware('auth')->middleware('isAdmin')->middleware('verified');
Route::post('/user/chtype/{id}', 'MyUserController@chtype')->middleware('auth')->middleware('isAdmin')->middleware('verified');


//post
Route::get('/viewpost/{id}', 'PostController@viewPost');
Route::get('/newpost', 'PostController@crearpost')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');
Route::post('/post/uploadimage', 'PostController@uploadImage')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');
Route::post('/sendpost', 'PostController@createPost')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');
Route::get('/editpost/{id}', 'PostController@editPost')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');
Route::post('/editpost/{id}', 'PostController@editPostedit')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');
Route::get('/deletepost/{id}', 'PostController@deletepost')->middleware('auth')->middleware('isAdmin')->middleware('verified');
Route::get('/viewposts', 'PostController@viewAllPost')->middleware('auth')->middleware('isAdmin')->middleware('verified');
Route::get('/viewmypost', 'PostController@viewMyPost')->middleware('auth')->middleware('isAdminOrEditor')->middleware('verified');




//comentarios
Route::post('/coment/{post}', 'MessagesController@createComentario')->middleware('auth')->middleware('auth')->middleware('verified');
Route::post('/coment/del/{id}', 'MessagesController@deleteComentario')->middleware('auth')->middleware('auth')->middleware('verified');

