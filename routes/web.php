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

//Home
Route::get('/', 'HomeController@getIndex');
Route::get('home', 'HomeController@getIndex');

//usuarios
Route::get('/myuser', 'MyUserController@getIndex')->middleware('auth');
Route::post('/myuser', 'MyUserController@update')->middleware('auth');
Route::post('/myuser/img', 'MyUserController@updateimage')->middleware('auth');
Route::post('/myuser/pass', 'MyUserController@updatePassword')->middleware('auth');
Route::get('/myuser/pass', 'MyUserController@getIndex')->middleware('auth');
Route::get('/viewusers', 'MyUserController@getviewusers')->middleware('isAdmin');
Route::post('/user/chtype/{id}', 'MyUserController@chtype')->middleware('isAdmin');


//post
Route::get('/viewpost/{id}', 'PostController@viewPost');
Route::get('/newpost', 'PostController@crearpost')->middleware('isAdminOrEditor');
Route::post('/post/uploadimage', 'PostController@uploadImage')->middleware('isAdminOrEditor');
Route::post('/sendpost', 'PostController@createPost')->middleware('isAdminOrEditor');
Route::get('/editpost/{id}', 'PostController@editPost')->middleware('isAdminOrEditor');
Route::post('/editpost/{id}', 'PostController@editPostedit')->middleware('isAdminOrEditor');
Route::get('/deletepost/{id}', 'PostController@deletepost')->middleware('isAdmin');
Route::get('/viewposts', 'PostController@viewAllPost')->middleware('isAdmin');

//comentarios
Route::post('/coment/{post}', 'ComentariosController@createComentario')->middleware('auth');
Route::post('/coment/del/{id}', 'ComentariosController@deleteComentario')->middleware('auth');


Auth::routes();