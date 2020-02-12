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
    $parentSteps = ParentStep::latest()->take(6)->get();

    //  logger($steps);
    // $categories = Category::all();

    foreach ($parentSteps as $parentStep) {
        Common::relationCategoryAndChildSteps($parentStep);
        $time = 0;
        foreach ($parentStep->childSteps as $childStep) {
            $time += $childStep->time;
        }
        $parentStep->time = $time / 60;
    }
    return view('steps.index', compact('parentSteps'));
    
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/mypage/edit', 'UsersController@edit')->name('mypage.edit');
    Route::patch('/mypage', 'UsersController@update')->name('mypage.update');
    Route::get('/mypage', 'UsersController@index')->name('mypage.index');
    Route::get('/password/edit', 'EditPasswordController@edit')->name('password.edit');
    Route::patch('/password', 'EditPasswordController@update')->name('password.update');
    Route::get('/steps/create', 'StepsController@create')->name('steps.create');
    Route::get('/steps/{id}/edit', 'StepsController@edit')->name('steps.edit');
    Route::patch('/steps/{id}', 'StepsController@update')->name('steps.update');
    Route::delete('/steps/{id}/delete', 'StepsController@destroy')->name('steps.destroy');
    Route::post('/steps', 'StepsController@store')->name('steps.store');
    Route::post('/challenge', 'ChallengeController@challenge');
    Route::post('/challenge/{id}/clear', 'ChallengeController@clear');

});

Route::get('/steps', 'StepsController@index')->name('steps.index');
Route::get('/steps/{id}', 'StepsController@showParent')->name('steps.showParent');
Route::get('/steps/{parent_id}/{child_id}', 'StepsController@showChild')->name('steps.showChild');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
