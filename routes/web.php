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
    return view('steps.index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('users/mypage', 'UsersController@mypage')->name('mypage');
    Route::resource('users', 'UsersController' ,['only' => ['edit', 'update']]); 
    Route::get('/steps/create', 'StepsController@create')->name('steps.create');
    Route::post('/steps', 'StepsController@store')->name('steps.store');
});
Route::get('/steps', 'StepsController@index')->name('steps.index');
Route::resource('users','UsersController', ['except' => ['edit', 'update', 'mypage']]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
