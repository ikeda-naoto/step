<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\lib\Common;
use App\Challenge;
use App\ChildStep;
use App\ParentStep;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function edit($id)
    {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');
        // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        if((int)$id !== Auth::id()) {
            return redirect('/users/mypage')->with('status', '不正な値が入力されました。');
        }

        return view('steps.profEdit');
    }

    public function update(Request $request, $id)
    {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/users/mypage');
        // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        if((int)$id !== Auth::id()) {
            return redirect('/users/mypage')->with('status', '不正な値が入力されました。');
        }

        // バリデーション 
        $request->validate([
            'name' => 'max:20',
            'introduction' => 'max:400',
            'pic' => 'nullable|file|image',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        

        $user = User::find($id);
        $user->fill($request->all());
        // ファイルが送信されていれば、そのパスを保存し、
        // if(!empty($request->pic)){
        //     $path = $request->pic->store('public/img');
        //     $user->pic = basename($path);
        // }
        Common::storePic($user, $request->pic);
        $user->save();

        return response()->json(['flg'=> true]);
    }

    public function mypage()
    {

        $registSteps = Auth::user()->parentSteps()->latest()->get();

        foreach ($registSteps as $registStep) {
            Common::relationCategoryAndChildSteps($registStep);
        }
        
        // logger($registSteps);
        
        $challengeSteps = Auth::user()->challenges()->latest()->get();

        foreach ($challengeSteps as $challengeStep) {
            $challengeStep->parentStep;
            // logger($challengeStep->parentStep);
            Common::relationCategoryAndChildSteps($challengeStep->parentStep);
        }

        return view('steps.mypage', compact('registSteps', 'challengeSteps'));
    }
}
