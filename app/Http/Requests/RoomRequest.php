<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_code' => 'required|min:3|unique:rooms,room_code',
            'name' => 'required|max:50',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,svg|max:2048',
            'floor' => 'required|max:3',
            'category_id' => 'required',
            'price' => 'required|integer',
            'rating' => 'max:1'
        ];
    }
}
