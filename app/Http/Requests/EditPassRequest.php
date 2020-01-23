<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumHalf;


class EditPassRequest extends FormRequest
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
            'password_old' => ['required', new AlphaNumHalf, 'min:6', 'max:30',],
            'password_new' => ['required',new AlphaNumHalf, 'min:6', 'max:30', 'confirmed'],
            'password_new_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'confirmed' => '新しいパスワードと新しいパスワード（再入力）の内容が一致しません。',
        ];
    }

    public function attributes()
    {
        return [
            'password_new' => '新しいパスワード',
            'password_old' => '現在のパスワード',
            'password_new_confirmation' => '新しいパスワード（再入力）',
        ];
    }

}
