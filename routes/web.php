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
// For the Views (User Side)

Route::get('/', function () {
 
    return view('Posts.Userlogin');
});

Route::get('/register', function () {
 
    return view('Posts.UserRegister');
});

Route::get('/register', 'RegisterController@index')->name('all');

Route::get('/index', 'PostController@index')->name('all');
Route::get('/edit/{id}', 'PostController@edit')->name('edit');

Route::put('/update/{id}', 'PostController@update');

Route::get('/delete/{id}','PostController@destroy');


Route::get('/show/{id}', 'PostController@show')->name('show');

Route::get('/create', 'PostController@create')->name('create');
Route::post('/insert', 'PostController@store')->name('insert');

// for comment controller 
Route::resource('/comments','CommentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
