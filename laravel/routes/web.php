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

// Begin default router
Route::get('/', function () {
    return view('index');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// End default router


// Begin router custom
Route::get('/phpinfo', 'Common@phpinfo');
// End router custom


// Begin router post
Route::get('/postwelcome', function () {
    return view('posts.welcome');
});
Route::get('/viewallposts', function () {
    $posts = DB::table('posts')->get();
    return view('posts.viewallposts', compact('posts'));
})->name('viewallposts');
Route::get('/addpost', function () {
    return view('posts.addpost');
});
Route::post('post/create', 'PostController@create')->name('postcreate');
Route::get('post/delete', 'PostController@postdelete')->name('postdelete');
Route::get('/viewonepost', 'PostController@viewonepost')->name('viewonepost');
Route::get('/updateonepost', 'PostController@updateonepost')->name('updateonepost');
Route::post('/updateonepost', 'PostController@updateonepostaction')->name('updateonepostaction');
// End router post


// Begin router barber shop
Route::get('/booking', function () {
  return view('booking');
});
Route::get('/admin/booking', 'AdminBookingController@index');
Route::get('/admin/config', 'AdminConfigController@index');
// End router barber shop


