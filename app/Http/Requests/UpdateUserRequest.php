<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:20',
            'introduction' => 'max:400',
            'pic' => 'nullable|file|image',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ニックネーム',
            'introduction' => '自己紹介',
            'pic' => 'プロフィール画像',
        ];
    }
}
