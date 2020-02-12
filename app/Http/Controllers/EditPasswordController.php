<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\Common;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditPassRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class EditPasswordController extends Controller
{
    // パスワード変更画面表示
    public function edit()
    {
        return view('auth.passEdit');
    }
    // パスワード変更処理
    public function update(EditPassRequest $request)
    {
        $user = Auth::user();

        // 入力された古いパスワードが違っていた場合
        if (!Hash::check($request->input('password_old'), $user->password)) {
            return redirect()->back()->with('status', 'パスワードを変更できませんでした。');
        }

        $user = User::find($user->id);
        // パスワードをハッシュ化して保存
        $user->password = Hash::make($request->get('password_new'));
        $user->save();

        // トークン上書き
        $request->session()->regenerateToken();

        return redirect('/mypage')->with('status', 'パスワードを変更しました。');
    }
}
