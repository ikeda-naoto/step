<?php

use Illuminate\Http\Request;
use App\ParentStep;
use App\Category;
use App\lib\Common;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->get('/steps', function (Request $request) {
    
    $parentSteps = ParentStep::query();
    // 全て以外のカテゴリーが選択された場合
    if((int)$request->c_id !== 0) {
        $parentSteps = $parentSteps->where('category_id', $request->c_id);
    }
    // キーワード検索された場合
    if(isset($request->keyword)) {
        $text =(urldecode($request->keyword));
        $parentSteps  = $parentSteps->where('title', 'LIKE', "%{$text}%");
    }
    // STEP作成日で降順にソートして取得
    $parentSteps = $parentSteps->orderBy('created_at', 'desc')->get();

    // それぞれの親STEPに紐づくカテゴリーと子STEPデータを取得
    foreach ($parentSteps as $parentStep) {
        Common::relationCategoryAndChildSteps($parentStep);
    }
    // ページネーションに必要なデータを生成
    $paginationData = Common::createPaginationData($parentSteps, $request);
    // カテゴリーデータ取得
    $categories = Category::all();

    return response()->json(['paginationData' => $paginationData, 'categories' => $categories]);

});
