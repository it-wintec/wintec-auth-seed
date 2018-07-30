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

Route::get('/hello', 'Hello@index');
Route::get('/hello/insert', 'Hello@insert');
Route::get('/hello/phpinfo', 'Hello@phpinfo');
Route::get('/hello/{name}', 'Hello@show');

Route::get('posts/welcome', function () {
    $name='Ayesha Jack';
	return view('posts/welcome', compact('name'));
});

Route::get('posts/viewallposts', function () {
    $posts = DB::table('posts')->get();
    return view('posts/viewallposts', compact('posts'));
});



