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
        // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        if(!ctype_digit($id) || (int)$id !== Auth::id()) {
            return redirect('/');
        }
        return view('steps.profEdit');
    }

    public function update(Request $request, $id)
    {
        // logger($request);

        // パラメータが数字かどうかチェック
        // パラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        if(!ctype_digit($id) || (int)$id !== Auth::id()) {
            return redirect('/');
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
        if(!empty($request->pic)){
            $path = $request->pic->store('public/img');
            $user->pic = basename($path);
        }
        $user->save();

        return response()->json(['flg'=> true]);
    }

    public function mypage()
    {

        $registSteps = Auth::user()->parentSteps;

        foreach ($registSteps as $registStep) {
            Common::relationCategoryAndChildSteps($registStep);
        }
        
        // logger($registSteps);
        
        $challengeSteps = Auth::user()->challenges;

        foreach ($challengeSteps as $challengeStep) {
            $challengeStep->parentStep;
            // logger($challengeStep->parentStep);
            Common::relationCategoryAndChildSteps($challengeStep->parentStep);
        }
        

        // logger($challengeSteps);




        // $challengeSteps->parent->id;
        
        // $parentSteps = ParentStep::all();
        // foreach ($parentSteps as $parentStep) {
        //     $parentStep->challenges;
        // }
        // logger($parentSteps);
        // $challengeSteps  = DB::table('parent_steps')
        //                     ->join('challenges', 'parent_steps.id', '=', 'challenges.parent_step_id')
        //                     //->join('orders', 'users.id', '=', 'orders.user_id')
        //                     ->select('parent_steps.*', 'challenges.clear_num')
        //                     ->where('challenges.user_id', Auth::user()->id)
        //                     ->get();
        // logger($challengeSteps);
        // foreach ($challengeSteps as $challengeStep) {
        //     // $childSteps = ChildStep::where('parent_step_id', $challengeStep->id)->get();
        //     $childSteps = $challengeStep->children;
        //     logger($childSteps);
        // }
        
        
        // foreach ($challengeSteps as $challengeStep) {
        //     logger($challengeStep->parent);
        //     logger($challengeStep);
        //     //  logger(ParentStep::find($challengeStep->parent_step_id));
        //}
        // logger($challengeSteps);

        // $challengeSteps = Common::addParentStepInfo($challengeSteps);

        return view('steps.mypage', compact('registSteps', 'challengeSteps'));
    }
}
