<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Challenge;
use App\Time;
use App\ParentStep;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ChallengeStep;
use App\lib\Common;
use App\User;
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
        $parentStep = new ParentStep;
        
        Common::storePic($parentStep, $request->pic);
        Auth::user()->parentSteps()->save($parentStep->fill($request->all()));

        Common::storeStep($request->input('child_title'), $request->input('time'), $request->input('child_content'), false, $parentStep);

        $request->session()->regenerateToken();
        
        return response()->json(['flg'=> true]);
    }

    public function edit($id) {

        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');

        $parentStep = ParentStep::where('id', $id)->select(['id', 'parent_title', 'category_id', 'parent_content', 'pic'])->first();

        Common::isExist($parentStep, '/users/mypage');


        $childSteps = ChildStep::where('parent_step_id', $id)->select(['child_title', 'time', 'child_content'])->get();

        $categories = Category::all();

        $editFlg = 1;

        return view('steps.registStep', compact('parentStep', 'childSteps', 'categories', 'editFlg'));
    }

    public function update(CreateStepRequest $request, $id) {

        $data = $request->all();

        Common::validNumber($id, '/users/mypage');


        $parentStep = ParentStep::find($id);

        Common::isExist($parentStep, '/users/mypage');

        $parentStep->fill($request->all());
    
        Common::storePic($parentStep, $request->pic);
        $parentStep->save();

        $childSteps = $parentStep->childSteps;

        Common::storeStep($request->input('child_title'), $request->input('time'), $request->input('child_content'), true, $parentStep, $childSteps);

        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);

    }

    public function showChild($parent_id, $child_id)
    {

        Common::validNumber($parent_id, '/users/mypage');
        Common::validNumber($child_id, '/users/mypage');

        // GETパラメータに付与された親STEPのIDと子STEPのIDが紐づいているかチェック
        Common::isExist(ChildStep::where('parent_step_id', $parent_id)->where('id', $child_id)->first(), '/steps');

        $parentStep = ParentStep::find($parent_id);
        $parentStep->childSteps;

        $showChildStep = ChildStep::find($child_id);

        // ユーザーがログインしているるとき
        if(Auth::user()) {
            // ログインユーザーがこの子STEPの親STEPをチャレンジしている場合変数にそのレコードを代入
            $challengeStep = Challenge::where('user_id', Auth::user()->id)->where('parent_step_id', $parent_id)->first();
        }
        
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
