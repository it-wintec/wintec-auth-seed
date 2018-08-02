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

// default router
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Begin custom router
Route::get('/phpinfo', 'Common@phpinfo');
Route::get('/viewallposts', function () {
    $posts = DB::table('posts')->get();
    return view('posts.viewallposts', compact('posts'));
});

