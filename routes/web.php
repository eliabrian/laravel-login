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

//Authentication
Route::get('/login', 'LoginController@showForm')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LogoutController@logout')->name('logout');
Route::get('/blocked', function () {
    return 'Blocked!';
})->name('blocked');

//Admin
Route::get('/admin', 'AdminController@index')->name('admin');

//User
Route::get('/user', 'UserController@index')->name('user');
