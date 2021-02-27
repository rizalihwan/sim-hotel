<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'min:3'],
            'avatar' => ['mimes:png,jpg,jpeg,svg', 'max:2048']
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Password Cannot Be Less than 3!',
            'avatar.max' => 'Image Over Size. Maximum 2048 MB!'
        ];
    }
}
