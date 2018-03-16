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

// Route::get('/', function () {
//     return view('index');  //closure method
// });

Route::get('/','StaticController@hello')->name('home'); //custom route method
// Route::resource('/','StaticController@hello');
Route::get('profile', function () {
    return view('profile');
})->name('profile');
Route::get('contact', function () {
    return view('contact');
})->name('contact');

route::resource('article','ArticleController');

Route::resource('comments','CommentsController');