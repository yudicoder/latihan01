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

Route::get('/','StaticController@hello')->name('awal'); //custom route method
// Route::resource('/','StaticController@hello');
Route::get('profile', function () {
    return view('profile');
})->name('profile');
Route::get('contact', function () {
    return view('contact');
})->name('contact');

route::resource('article','ArticleController');

Route::resource('comments','CommentsController');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('employee', 'EmployeeController');
 
Route::resource('manager', 'ManagerController');

// Route::get('/', function(){return redirect('image');
// });

Route::resource('image', 'ImageController');

// Route::resource('register', 'RegisterController');

Route::get('get-users', 'HomeController@getUsers')->name('get-users');
Route::put('update-user', 'HomeController@updateUser')->name('update-user');
Route::delete('delete-user/{id}', 'HomeController@deleteUser')->name('delete-user');

Route::resource('status', 'manager\ArticleController');
