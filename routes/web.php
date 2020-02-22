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
Route::post('/myuser', 'MyUserController@update');
Route::post('/myuser/img', 'MyUserController@updateimage');
Route::post('/myuser/pass', 'MyUserController@updatePassword');
Route::get('/myuser/pass', 'MyUserController@getIndex');

//post
Route::get('/newpost', 'PostController@crearpost');
Route::post('/post/uploadimage', 'PostController@uploadImage');
Route::post('/sendpost', 'PostController@createPost');
Route::get('/viewpost/{nombre}', 'PostController@viewPost');

//comentarios
Route::post('/coment/{post}', 'ComentariosController@createComentario');
Route::post('/coment/del/{id}', 'ComentariosController@deleteComentario');


Auth::routes();