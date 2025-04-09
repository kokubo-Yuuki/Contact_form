<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|email|max:50',
            'sex' => 'required|max:10',
            'category' => 'required|max:20',
            'image_path' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'play_env' => 'required|max:10',
            'message' => 'required|max:300',
        ];
    }


    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'sex' => '性別',
            'category' => 'カテゴリ',
            'image_path' => '画像ファイル',
            'play_env' => 'プレイ環境',
            'message' => 'お問い合わせ内容',
        ];
    }
}
