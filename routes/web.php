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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/hello', 'Hello@index');
Route::get('/show/{name}', 'Hello@show');
Route::get('/hello/insert', 'Hello@insert');
Route::resource('post', 'PostController');

Route::get('posts/welcome', function () {
    $name='Ayesha Jack';
	return view('posts/welcome', compact('name'));
});

Route::get('posts/viewallposts', function () { 
    $posts=	[
        'First Post',			
        'Second Post',
		'Third Post'];
    return view('posts/viewallposts', compact('posts'));
});



