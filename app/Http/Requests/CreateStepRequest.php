<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStepRequest extends FormRequest
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
            'parent_title' => 'required|max:30',
            'category_id' => 'required|integer',
            'parent_content' => 'required|max:20000',
            'pic' => 'nullable|file|image|dimensions:min_width=300, min_height=200',
            'child_title.*' => 'required|max:30',
            'time.*' => 'integer|min:1',
            'child_content.*' => 'required|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeは必須です。',
            'min' => ':attributeを選択してください。'
        ];
    }

    public function attributes()
    {

        $attributes = [
            'parent_title' => 'STEPのタイトル',
            'category_id' => 'カテゴリー',
            'parent_content' => 'STEPの内容',
            'pic' => 'STEP画像',
        ];

        foreach ($this->request->get('child_title') as $key => $value){

            $stepNumber = $key + 1;
    
            $attributes = array_merge(
                $attributes,
                [
                    "child_title.$key" => "STEP" . $stepNumber. "のタイトル",
                    "time.$key" => "STEP" . $stepNumber. "の目安達成時間",
                    "child_content.$key" => "STEP" . $stepNumber. "の内容",
                ]
            );
        }

        return $attributes;
    }
}
