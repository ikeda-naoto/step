<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\lib\Common;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function edit()
    {
        return view('steps.profEdit');
    }

    public function update(UpdateUserRequest $request)
    {        
        // ログイン中のユーザーの情報をレコードを取得
        $user = User::find(Auth::user()->id);
        // データをDBに保存
        $user->fill($request->all());
        // 画像の送信があった場合は画像のデータも保存する
        Common::storePic($user, $request->pic);
        $user->save();

        // フラッシュメッセージを保存
        session()->flash('status', 'プロフィールを編集しました。');
        logger($request);
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);
    }

    public function mypage()
    {
        // ログイン中のユーザーが登録した親STEPのレコードを取得
        $registSteps = Auth::user()->parentSteps()->latest()->get();
        // 子STEPとカテゴリーの情報を付与する
        foreach ($registSteps as $registStep) {
            Common::relationCategoryAndChildSteps($registStep);
        }
        
        // ログイン中のユーザーがチャレンジ情報を取得
        $challengeSteps = Auth::user()->challenges()->latest()->get();
        foreach ($challengeSteps as $challengeStep) {
            // 親STEPの情報を付与する
            $challengeStep->parentStep;
            // 子STEPとカテゴリーの情報を付与する
            Common::relationCategoryAndChildSteps($challengeStep->parentStep);
        }

        return view('steps.mypage', compact('registSteps', 'challengeSteps'));
    }


}
