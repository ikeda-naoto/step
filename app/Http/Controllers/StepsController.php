<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Time;
use App\ParentStep;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ChallengeStep;
use App\lib\Common;

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

    public function create()
    {
        $categories = Category::all();

        return view('steps.registStep', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_title' => 'required|max:20',
            'category_id' => 'required|integer',
            'parent_content' => 'required|max:20000',
            'file' => 'nullable|file|image',
            'child_title.*' => 'required|max:20',
            'time.*' => 'required|integer',
            'child_content.*' => 'required|max:20000',
        ]);
        
        if($request->file){
            // logger('aaa');
            // $file = $request->file('file');
            // $fileName = $file->hashName();
            // \Image::make($file)->resize('300', '300')->save(public_path('/images/'.$fileName) );
            $path = $request->file->store('public/img');
            $request->merge(['pic' => basename($path)]);
        }

        $parentStep = new ParentStep;

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
            $parentStep->children()->save($childStep->fill($data));
        }
        //logger($request);
        return response()->json(['flg'=> true]);
    }

    public function show($id) {
        // GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)) {
            return redirect('/steps');
        }

        $parentStep = ParentStep::find($id);

        // GETパラメータが改ざんされていないかチェック
        if(!$parentStep) {
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

}
