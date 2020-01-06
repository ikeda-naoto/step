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
    public function edit()
    {
        // // GETパラメータが数字かどうかチェック
        // Common::validNumber($id, '/users/mypage');
        // // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        // if((int)$id !== Auth::id()) {
        //     return redirect('/users/mypage')->with('status', '不正な値が入力されました。');
        // }

        return view('auth.passEdit');
    }

    public function update(EditPassRequest $request)
    {
        // // GETパラメータが数字かどうかチェック
        // Common::validNumber($id, '/users/mypage');
        // // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        // if((int)$id !== Auth::id()) {
        //     return redirect('/users/mypage')->with('status', '不正な値が入力されました。');
        // }
        
        $user = Auth::user();

        if (!Hash::check($request->input('password_old'), $user->password)) {
            return redirect()->back()->with('status', 'パスワードを変更できませんでした。');
        }

        $user = User::find($user->id);
        $user->password = Hash::make($request->get('password_new'));
        $user->save();

        return redirect('/users/mypage')->with('status', 'パスワードを変更しました。');
    }
}
