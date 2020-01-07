<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChallengeController extends Controller
{
    public function challenge(Request $request)
    {
        // 通常であれば引っかからないが念のためバリデーション 
        $request->validate([
            'parent_step_id' => 'required|integer',
            'clear_num' => 'required',
        ]);
        
        $challenge = new Challenge;
        
        Auth::user()->challenges()->save($challenge ->fill($request->all()));

        $request->session()->regenerateToken();

        return response()->json(['flg'=> true]);

    }

    public function clear(Request $request, $id)
    {
        // GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)) {
            return redirect('/steps');
        }
        
        $challenge = Challenge::where('user_id', Auth::user()->id)->where('parent_step_id', $id)->first();
        if(empty($challenge)) {
            return redirect('/steps');
        }

        $challenge->clear_num = $challenge->clear_num + 1;
        $challenge->save();

        $nextStep = ChildStep::where('parent_step_id', $challenge->parent_step_id)->where('num', '>',  $challenge->clear_num)->first();

        if(!empty($nextStep)) {
            $nextStepId = $nextStep->id;
            session()->flash('status', 'おめでとうございます！次のSTEPが解放されました！');
        }else {
            $nextStepId = null;
            session()->flash('status', 'おめでとうございます！' . $challenge->parentStep->parent_title . 'の全てのSTEPをクリアしました。');
        }

        $request->session()->regenerateToken();

        return response()->json(['flg'=> true, 'nextStepId' => $nextStepId]);

    }
}
