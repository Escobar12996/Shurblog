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
Route::get('/myuser', 'MyUserController@getIndex');
Route::post('/myuser/{id}', 'MyUserController@update');
Route::post('/myuser/img/{id}', 'MyUserController@updateimage');

//post
Route::get('/newpost', 'PostController@crearpost');
Route::post('/post/uploadimage', 'PostController@uploadImage');
Route::post('/sendpost', 'PostController@createPost');
Route::get('/viewpost/{nombre}', 'PostController@viewPost');
Route::post('/coment/{post}', 'ComentariosController@createComentario');


Auth::routes();