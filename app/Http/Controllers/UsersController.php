<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\AlphaNumHalf;
use Intervention\Image\Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GETパラメータが数字かどうかチェック
        // GETパラメータの値が改ざんされていないか（ログイン中のユーザーIDと同じか）チェック
        if(!ctype_digit($id) || (int)$id !== Auth::id()) {
            return redirect('/');
        }
        return view('steps.profEdit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'file' => 'nullable|file|image',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        // ファイルが送信されていれば、そのパスを保存し、
        if($request->file){
            logger('aaa');
            // $file = $request->file('file');
            // $fileName = $file->hashName();
            // \Image::make($file)->resize('300', '300')->save(public_path('/images/'.$fileName) );
            $path = $request->file->store('public/img');
            $request->merge(['pic' => basename($path)]);
        }

        $user = User::find($id);
        $user->fill($request->all())->save();
        return response()->json(['flg'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mypage()
    {
        return view('steps.mypage');
    }
}
