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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect('/steps');
    }

    // $steps = DB::table('parent_steps')
    // ->select('parent_steps.*', 'categories.name')
    // ->Join('categories', 'parent_steps.category_id', '=', 'categories.id')
    // ->orderBy('id', 'DESC')->take(6)->get();
    $steps = ParentStep::orderBy('id', 'DESC')->take(6)->get();

    //  logger($steps);
    // $categories = Category::all();

    foreach ($steps as $step) {
        // 各親STEPのカテゴリーを取得し、連想配列に追加
        $step->categoryName = $step->category->getData();
        // 各親STEPに紐づいている子STEPを取得
        $childSteps = $step->children;
        // 各子STEPの終了目安時間の合計を連想配列に追加
        $step->time = $childSteps->where('parent_step_id', $step->id)->sum('time');
        // 各親STEPに紐づく子STEPの数の合計を連想配列に追加
        $step->sumChildNum = $childSteps->count();
    }
    //$steps = ParentStep::orderBy('id', 'DESC')->take(6)->get();
    return view('steps.index', compact('steps'));
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('users/mypage', 'UsersController@mypage')->name('mypage');
    Route::resource('users', 'UsersController' ,['only' => ['edit', 'update']]); 
    Route::get('/steps/create', 'StepsController@create')->name('steps.create');
    Route::post('/steps', 'StepsController@store')->name('steps.store');
});
Route::get('/steps', 'StepsController@index')->name('steps.index');
Route::get('/steps/{id}', 'StepsController@show')->name('steps.show');
Route::resource('users','UsersController', ['except' => ['edit', 'update', 'mypage']]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
