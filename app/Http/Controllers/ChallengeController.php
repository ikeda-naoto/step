<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use App\lib\Common;

class ChallengeController extends Controller
{
    // チャレンジ処理
    public function challenge(Request $request)
    {
        // 通常であれば引っかからないが念のためバリデーション
        $request->validate([
            'parent_step_id' => 'required|integer',
            'clear_num' => 'required',
        ]);
        
        $challenge = new Challenge;
        Auth::user()->challenges()->save($challenge ->fill($request->all()));
        // トークン書き換え
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);

    }
    // クリア処理
    public function clear(Request $request, $id)
    {
        // GETパラメータが数字かどうかチェック
        Common::validNumber($id, '/steps');
        // ログインしているユーザーの該当するチャレンジレコードを取得
        $challenge = Challenge::where('user_id', Auth::user()->id)->where('parent_step_id', $id)->first();
        // もしレコードがなかったら
        if(empty($challenge)) {
            return redirect('/steps')->with('status', '不正な値が入力されました。');
        }
        // チャレンジのクリア数を1つ増やす
        $challenge->clear_num = $challenge->clear_num + 1;
        $challenge->save();
        // 次のSTEPのレコードを取得
        $nextStep = ChildStep::where('parent_step_id', $challenge->parent_step_id)->where('num', '>',  $challenge->clear_num)->first();

        if(!empty($nextStep)) { // 次のSTEPがあった場合
            $nextStepId = $nextStep->id;
            session()->flash('status', 'おめでとうございます！次のSTEPが解放されました！');
        }else { // 次のSTEPがなかった場合
            $nextStepId = null;
            session()->flash('status', 'おめでとうございます！' . $challenge->parentStep->title . 'の全てのSTEPをクリアしました。');
        }
        // トークン書き換え
        $request->session()->regenerateToken();

        return response()->json(['flg'=> true, 'nextStepId' => $nextStepId]);

    }
}
