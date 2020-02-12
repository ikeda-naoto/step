<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\lib\Common;
use App\Http\Requests\UpdateUserRequest;
use App\Clear;
use App\ParentStep;

class UsersController extends Controller
{
    // マイページ表示
    public function index()
    {
        // ログイン中のユーザーが登録した親STEPのレコードを取得
        $registSteps = Auth::user()->parentSteps()->latest()->get();
        // 各親STEPに子STEPとカテゴリーの情報を付与する
        foreach ($registSteps as $registStep) {
            Common::relationCategoryAndChildSteps($registStep);
        }
        
        // ログイン中のユーザーのチャレンジ情報を取得
        $challengeSteps = Auth::user()->challenges()->latest()->get();
        foreach ($challengeSteps as $challengeStep) {
            // 取得したチャレンジ情報に親STEPの情報を付与する
            $challengeStep->parent_step = ParentStep::withTrashed()->find($challengeStep->parent_step_id);
            // 取得したチャレンジ情報にクリア数を付与する
            $challengeStep->clearNum = Clear::where('challenge_id', $challengeStep->id)->count();
            // 子STEPとカテゴリーの情報を付与する
            Common::relationCategoryAndChildSteps($challengeStep->parent_step);
        }
    
        return view('steps.mypage', compact('registSteps', 'challengeSteps'));
    }
    // プロフィール変更画面を表示
    public function edit()
    {
        return view('steps.profEdit');
    }
    // プロフィール変更処理
    public function update(UpdateUserRequest $request)
    {        
        // ログイン中のユーザーのレコードを取得
        $user = User::find(Auth::user()->id);
        // 保存するデータをDBに
        $userData = array(
            'name' => $request->name,
            'introduction' => $request->introduction,
            'email' => $request->email,
        );
        // 画像の送信があった場合は画像も保存する
        $userData = Common::storePic($userData, $request->pic);
        // データをDBに保存
        $user->fill($userData)->save();

        // フラッシュメッセージを保存
        session()->flash('status', 'プロフィールを編集しました。');
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);
    }
}
