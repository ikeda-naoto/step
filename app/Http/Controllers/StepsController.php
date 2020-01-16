<?php

namespace App\Http\Controllers;

use App\Category;
use App\Challenge;
use App\ParentStep;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use App\lib\Common;
use App\Http\Requests\CreateStepRequest;

class StepsController extends Controller
{
    public function index()
    {
        return view('steps.stepList');
    }

    public function showParent($id) {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/steps');

        // GETパラメータから親STEPのレコードを取得
        $parentStep = ParentStep::find($id);
        
        // レコードが存在するかどうかチェック
        Common::isExist($parentStep, '/steps');

        // 親STEPに紐づくカテゴリーと子STEPデータを取得
        Common::relationCategoryAndChildSteps($parentStep);

        // このSTEPを作ったユーザの情報を取得
        $createUser = $parentStep->user;

        // すでにチャレンジしているSTEPかを判定するフラグ
        $challengeFlg = 0;
        // ログインしていてかつチャレンジしている場合
        if(Auth::check() && Auth::user()->challenges()->where('parent_step_id', $id)->exists()) {
            // フラグをtrueに
            $challengeFlg = 1;
        }

        return view('steps.parentStepDetail', compact('parentStep', 'createUser', 'challengeFlg'));
    }

    public function create()
    {
        // カテゴリーデータを取得
        $categories = Category::all();
        // 編集フラグをfalseに
        $editFlg = 0;

        return view('steps.registStep', compact('categories', 'editFlg'));
    }

    public function store(CreateStepRequest $request)
    {
        // 親STEP登録処理
        $parentStep = new ParentStep;
        // 画像登録処理
        Common::storePic($parentStep, $request->pic);
        Auth::user()->parentSteps()->save($parentStep->fill($request->all()));

        // 子STEP登録処理
        Common::storeStep($request->input('child_title'), $request->input('time'), $request->input('child_content'), false, $parentStep);
        // トークンを上書き
        $request->session()->regenerateToken();
        
        return response()->json(['flg'=> true]);
    }

    public function edit($id) {

        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');
        // GETパラメータに該当するSTEPのレコードを取得
        $parentStep = ParentStep::where('id', $id)->select(['id', 'parent_title', 'category_id', 'parent_content', 'pic'])->first();
        // レコードが存在するかどうかチェック
        Common::isExist($parentStep, '/users/mypage');

        // 前の処理で取得した親STEPに該当する子STEPを取得
        $childSteps = ChildStep::where('parent_step_id', $id)->select(['child_title', 'time', 'child_content'])->get();

        // 全カテゴリーのデータを取得
        $categories = Category::all();

        // 編集フラグをtrueに
        $editFlg = 1;

        return view('steps.registStep', compact('parentStep', 'childSteps', 'categories', 'editFlg'));
    }

    public function update(CreateStepRequest $request, $id) {

        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');

        // GETパラメータに該当するSTEPのレコードを取得
        $parentStep = ParentStep::find($id);
        // レコードが存在するかどうかチェック   
        Common::isExist($parentStep, '/users/mypage');
        // 親STEPを更新
        $parentStep->fill($request->all());
        Common::storePic($parentStep, $request->pic);
        $parentStep->save();

        // 親STEPに該当する子STEPを取得
        $childSteps = $parentStep->childSteps;
        // 子STEPを更新
        Common::storeStep($request->input('child_title'), $request->input('time'), $request->input('child_content'), true, $parentStep, $childSteps);

        // トークン上書き
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);

    }

    public function showChild($parent_id, $child_id)
    {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($parent_id, '/users/mypage');
        Common::validNumber($child_id, '/users/mypage');

        // GETパラメータに付与された親STEPのIDと子STEPのIDが紐づいているかチェック
        Common::isExist(ChildStep::where('parent_step_id', $parent_id)->where('id', $child_id)->first(), '/steps');
        // 親STEPとそれに紐づく子STEPを取得
        $parentStep = ParentStep::find($parent_id);
        $parentStep->childSteps;

        // 表示する子STEPのデータを取得
        $showChildStep = ChildStep::find($child_id);

        // ユーザーがログインしているるとき
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
            $clear_num = $challengeStep->clear_num;
        }

        return view('steps.childStepDetail', compact('parentStep', 'showChildStep', 'clear_num', 'challengeFlg'));
    }

}
