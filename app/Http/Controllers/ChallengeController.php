<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function challenge(Request $request)
    {
        $request->validate([
            'parent_step_id' => 'required|integer',
            'clear_num' => 'required',
        ]);
        
        $challenge = new Challenge;
        //logger($request);

        
        logger(Auth::user()->challenges()->save($challenge ->fill($request->all())));

        return response()->json(['flg'=> true]);

    }
}
