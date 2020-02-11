<?php

namespace App\Http\Controllers;

use App\Category;
use App\Challenge;
use App\ParentStep;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use App\lib\Common;
use App\Http\Requests\CreateStepRequest;
use App\Clear;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    // ホーム画面表示
    public function index()
    {
        return view('steps.stepList');
    }
    // 親STEP画面表示
    public function showParent($id) {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/steps');

        // GETパラメータから親STEPのレコードを取得
        $parentStep = ParentStep::withTrashed()->find($id);
        
        // レコードが存在するかどうかチェック
        Common::isExist($parentStep, '/steps');

        // 親STEPに紐づくカテゴリーと子STEPデータを取得
        Common::relationCategoryAndChildSteps($parentStep);

        // このSTEPを作ったユーザの情報を取得
        $createUser = $parentStep->user;

        // ログインユーザーがすでにチャレンジしているSTEPかを判定するフラグ
        $challengeFlg = 0;
        // ログインしていてかつチャレンジしている場合
        if(Auth::check() && Auth::user()->challenges()->where('parent_step_id', $id)->exists()) {
            // フラグをtrueに
            $challengeFlg = 1;
        }

        return view('steps.parentStepDetail', compact('parentStep', 'createUser', 'challengeFlg'));
    }
    // STEP登録画面表示
    public function create()
    {
        // カテゴリーデータを取得
        $categories = Category::all();
        // 編集フラグをfalseに
        $editFlg = 0;

        return view('steps.registStep', compact('categories', 'editFlg'));
    }
    // STEP登録処理
    public function store(CreateStepRequest $request)
    {

        $parentStep = new ParentStep;
       
        // 親STEP登録処理
        Common::storeParentStep($request, $parentStep);

        // 子STEP登録処理
        Common::storeChildSteps($request, false, $parentStep);

        // トークンを上書き
        $request->session()->regenerateToken();
        
        return response()->json(['flg'=> true]);
    }
    // STEP編集画面表示
    public function edit($id) {

        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');
        // GETパラメータに該当する親STEPのレコードを取得
        $parentStep = ParentStep::where('id', $id)->select(['id', 'title', 'category_id', 'content', 'pic', 'user_id'])->first();
        // レコードが存在するかどうかチェック
        Common::isExist($parentStep, '/users/mypage');

        // STEPを登録したユーザーと編集しようとしているユーザーが同じかどうかチェック
        Common::validUser($parentStep->user_id);

        // 前の処理で取得した親STEPの子STEPを取得
        $childSteps = ChildStep::where('parent_step_id', $id)->select(['id', 'title', 'time', 'content'])->get();

        // 全カテゴリーのデータを取得
        $categories = Category::all();

        // 編集フラグをtrueに
        $editFlg = 1;

        return view('steps.registStep', compact('parentStep', 'childSteps', 'categories', 'editFlg'));
    }
    // STEP更新処理
    public function update(CreateStepRequest $request, $id) {

        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');

        // GETパラメータに該当するSTEPのレコードを取得
        $parentStep = ParentStep::find($id);

        // レコードが存在するかどうかチェック   
        Common::isExist($parentStep, '/users/mypage');

        // STEPを登録したユーザーと編集しようとしているユーザーが同じかどうかチェック
        Common::validUser($parentStep->user_id);

        // 子STEPを削除する場合
        if(!empty($request->deleteChildStepId)) { 
            foreach ($request->deleteChildStepId as $key => $value) {
                // 該当する子STEPを削除（念のため親STEPと子STEPが紐づいていることを確認）
                ChildStep::where('parent_step_id', $parentStep->id)->where('id', $value)->delete();
            }
        }

        // 親STEPを更新
        Common::storeParentStep($request, $parentStep);
        
        // 親STEPの子STEPを取得
        $childSteps = $parentStep->childSteps;

        // 子STEPを更新
        Common::storeChildSteps($request, true, $parentStep, $childSteps);

        // トークン上書き
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);

    }

    public function destroy(Request $request, $id) {
        
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');

        $parentStep = ParentStep::find($id);

        // レコードが存在するかどうかチェック  
        Common::isExist($parentStep, '/users/mypage');

        // STEPを登録したユーザーと削除しようとしているユーザーが同じかどうかチェック
        Common::validUser($parentStep->user_id);

        // STEPを論理削除する
        $parentStep->delete();

        // トークンを上書き
        $request->session()->regenerateToken();
        
        return redirect('/users/mypage')->with('status', $parentStep->title.'を削除しました');
    }

    public function showChild($parent_id, $child_id)
    {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($parent_id, '/users/mypage');
        Common::validNumber($child_id, '/users/mypage');

        // GETパラメータに付与された親STEPのIDと子STEPのIDが紐づいているかチェック
        Common::isExist(ChildStep::where('parent_step_id', $parent_id)->where('id', $child_id)->first(), '/steps');

        // 親STEPとそれに紐づく子STEPを取得
        $parentStep = ParentStep::withTrashed()->find($parent_id);
        $parentStep->childSteps;

        // 表示する子STEPのデータを取得
        $showChildStep = ChildStep::find($child_id);

        // ユーザーがログインしているとき
        if(Auth::user()) {
            // ログインユーザーがこの子STEPの親STEPをチャレンジしている場合変数にそのレコードを代入
            $challengeStep = Challenge::where('user_id', Auth::user()->id)->where('parent_step_id', $parent_id)->first();
        }
        
        // チャレンジフラグとクリア数を0で初期化
        $challengeFlg = $clear_num = 0;
        // チャレンジしている場合
        if(!empty($challengeStep)) {
            // チャレンジフラグを1に
            $challengeFlg = 1;
            // STEPのクリア数を代入
            $clear_num = Clear::where('challenge_id', $challengeStep->id)->count();
        }

        return view('steps.childStepDetail', compact('parentStep', 'showChildStep', 'clear_num', 'challengeFlg'));
    }

}
