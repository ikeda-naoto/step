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

use App\ParentStep;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\lib\Common;

Route::get('/', function () {
    if(Auth::check()) {
        return redirect('/steps');
    }

    // $steps = DB::table('parent_steps')
    // ->select('parent_steps.*', 'categories.name')
    // ->Join('categories', 'parent_steps.category_id', '=', 'categories.id')
    // ->orderBy('id', 'DESC')->take(6)->get();
    $parentSteps = ParentStep::orderBy('id', 'DESC')->take(6)->get();

    //  logger($steps);
    // $categories = Category::all();

    foreach ($parentSteps as $parentStep) {
        Common::relationCategoryAndChildSteps($parentStep);
    }
    //$steps = ParentStep::orderBy('id', 'DESC')->take(6)->get();
    return view('steps.index', compact('parentSteps'));
    
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/users/{id}', 'UsersController@update')->name('users.update');
    Route::get('/users/mypage', 'UsersController@mypage')->name('mypage');
    Route::get('/steps/create', 'StepsController@create')->name('steps.create');
    Route::get('/steps/{id}/edit', 'StepsController@edit')->name('steps.edit');
    Route::put('/steps/{id}', 'StepsController@update')->name('steps.update');
    Route::post('/steps', 'StepsController@store')->name('steps.store');
    Route::post('/challenge', 'ChallengeController@challenge');
    Route::post('/challenge/{id}/clear', 'ChallengeController@clear');
});

Route::get('/steps', 'StepsController@index')->name('steps.index');
Route::get('/steps/{id}', 'StepsController@showParent')->name('steps.showParent');
Route::get('/steps/{parent_id}/{child_id}', 'StepsController@showChild')->name('steps.showChild');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
