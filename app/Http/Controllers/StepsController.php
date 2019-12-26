<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Time;
use App\ParentStep;
use App\ChildStep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StepsController extends Controller
{
    public function index()
    {
        $steps = DB::table('parent_steps')
                ->leftJoin('categories', 'parent_steps.category_id', '=', 'categories.id')
                ->get();

        $categories = Category::all();
        return view('steps.stepList', compact('steps', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $times = Time::all();

        return view('steps.registStep', compact('categories', 'times'));
    }

    public function store(Request $request)
    {
        logger($request->input('child_title'));
        $request->validate([
            'parent_title' => 'required|max:20',
            'category_id' => 'required|integer',
            'parent_content' => 'required|max:20000',
            'file' => 'nullable|file|image',
            'child_title.*' => 'required|max:20',
            'time_id.*' => 'required|integer',
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

        Auth::user()->steps()->save($parentStep->fill($request->all()));
        
        // 子STEPの内容の配列をそれぞれの変数に代入
        $childTitle = $request->input('child_title');
        $timeId = $request->input('time_id');
        $childContent = $request->input('child_content');
        // 子STEPを一つ一つDBに保存
        for ($i = 0; $i < count($childTitle); $i++) { // 子STEPのタイトルの配列の要素数でループの回数を決定。タイトルは必須項目なので、少なくとも一つはある
            $data = array(
                'child_title' => $childTitle[$i],
                'time_id' => $timeId[$i],
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


}
