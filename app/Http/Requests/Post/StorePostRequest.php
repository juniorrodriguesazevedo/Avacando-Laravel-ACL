<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Facades\Auth;
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
        if (Auth::check() && Auth::user()->hasPermissionTo('post_create') || Auth::user()->hasRole('Super Admin')) {
            return true;
        }

        return false;
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
