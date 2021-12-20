<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255'],
            'content' => ['required', 'min:3', 'max:3000'],
            'image' => ['required', 'image'],
            'status' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'content' => 'conteúdo'
        ];
    }
}