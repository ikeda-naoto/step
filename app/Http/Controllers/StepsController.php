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

class StepsController extends Controller
{
    public function index()
    {
        $parentSteps = ParentStep::all();
    
        // それぞれの親STEPに紐づくカテゴリーと子STEPデータを取得
        foreach ($parentSteps as $parentStep) {
            Common::relationCategoryAndChildSteps($parentStep);
        }

        $categories = Category::all();

        return view('steps.stepList', compact('parentSteps', 'categories'));
    }

    public function showParent($id) {
        // GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)) {
            return redirect('/steps');
        }

        $parentStep = ParentStep::find($id);
        // GETパラメータが改ざんされていないかチェック
        if(empty($parentStep)) {
            return redirect('/steps');
        }

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
        $categories = Category::all();
        $editFlg = 0;

        return view('steps.registStep', compact('categories', 'editFlg'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_title' => 'required|max:20',
            'category_id' => 'required|integer',
            'parent_content' => 'required|max:20000',
            'pic' => 'nullable|file|image',
            'child_title.*' => 'required|max:20',
            'time.*' => 'required|integer',
            'child_content.*' => 'required|max:20000',
        ]);
        


        $parentStep = new ParentStep;

        if(!empty($request->pic)){
            $path = $request->pic->store('public/img');
            $parentStep->pic = basename($path);
        }
        Auth::user()->parentSteps()->save($parentStep->fill($request->all()));
        
        // 子STEPの内容の配列をそれぞれの変数に代入
        $childTitle = $request->input('child_title');
        $time = $request->input('time');
        $childContent = $request->input('child_content');
        // 子STEPを一つ一つDBに保存
        for ($i = 0; $i < count($childTitle); $i++) { // 子STEPのタイトルの配列の要素数でループの回数を決定。タイトルは必須項目なので、少なくとも一つはある
            $data = array(
                'child_title' => $childTitle[$i],
                'time' => $time[$i],
                'child_content' => $childContent[$i],
                'num' => $i+1,
            );
            // logger($data);
            $childStep = new ChildStep;
            $parentStep->childSteps()->save($childStep->fill($data));
        }
        //logger($request);
        return response()->json(['flg'=> true]);
    }

    public function edit($id) {

        // GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)) {
            return redirect('/steps');
        }

        $parentStep = ParentStep::where('id', $id)->select(['id', 'parent_title', 'category_id', 'parent_content', 'pic'])->first();
        if(empty($parentStep)) {
            return redirect('/steps');
        }


        $childSteps = ChildStep::where('parent_step_id', $id)->select(['child_title', 'time', 'child_content'])->get();

        $categories = Category::all();

        // logger($parentStep);
        // logger($childSteps);

        $editFlg = 1;

        return view('steps.registStep', compact('parentStep', 'childSteps', 'categories', 'editFlg'));
    }

    public function update(Request $request, $id) {
        logger($request);

        $request->validate([
            'parent_title' => 'required|max:20',
            'category_id' => 'required|integer',
            'parent_content' => 'required|max:20000',
            'pic' => 'nullable|file|image',
            'child_title.*' => 'required|max:20',
            'time.*' => 'required|integer',
            'child_content.*' => 'required|max:20000',
        ]);

        $data = $request->all();

        if(!ctype_digit($id)) {
            return redirect('/steps');
        }

        $parentStep = ParentStep::find($id);
        $parentStep->fill($request->all());
        if(!empty($request->pic)){
            $path = $request->pic->store('public/img');
            $parentStep->pic = basename($path);
        }
        $parentStep->save();

        $childSteps = $parentStep->childSteps;
        

        // 子STEPの内容の配列をそれぞれの変数に代入
        $childTitle = $request->input('child_title');
        $time = $request->input('time');
        $childContent = $request->input('child_content');
        // 子STEPを一つ一つDBに保存
        for ($i = 0; $i < count($childTitle); $i++) { // 子STEPのタイトルの配列の要素数でループの回数を決定。タイトルは必須項目なので、少なくとも一つはある
            $data = array(
                'child_title' => $childTitle[$i],
                'time' => $time[$i],
                'child_content' => $childContent[$i],
                'num' => $i+1,
            );
            if(!empty($childSteps[$i])) {
                $childStep = $childSteps[$i];
                $childStep->fill($data)->save();
            }else {
                $childStep = new ChildStep;
                $parentStep->childSteps()->save($childStep->fill($data));
            }
        }

    }

    public function showChild($parent_id, $child_id)
    {
        if(!ctype_digit($parent_id) || !ctype_digit($child_id)) {
            return redirect('/steps');
        }

        // $parentStep = ParentStep::find($parent_id);

        // if(!$parentStep) {
        //     return redirect('/steps');
        // }

        if(!ChildStep::where('parent_step_id', $parent_id)->where('id', $child_id)->exists()) {
            return redirect('/steps');
        }

        $parentStep = ParentStep::find($parent_id);
        $parentStep->childSteps;

        // $challengeSteps = Auth::user()->challenges;

        // $clear_num = Auth::user()->challenges->where('parent_step_id', $parent_id)->first();

        if(Auth::user()) {
            $challengeStep = Challenge::where('user_id', Auth::user()->id)->where('parent_step_id', $parent_id)->first();
        }
        
        // $a = $clear_num->where('parent_step_id', $parent_id)->first();

        // logger($challengeStep);

        
        $challengeFlg = $clear_num = 0;
        if(!empty($challengeStep)) {
            $challengeFlg = 1;
            $clear_num = $challengeStep->clear_num;
        }
        // logger($a);

        // logger($clear_num);
        // $clear_num = 0;
        // if(Auth::check() && !empty(Auth::user()->challenges)) {
        //     $clear_num = Auth::user()->challenges->where('parent_step_id', $parent_id)->first();
        // }

        

        return view('steps.childStepDetail', compact('parentStep', 'child_id', 'clear_num', 'challengeFlg'));
    }

}
