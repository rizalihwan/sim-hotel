<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booking_code' => 'required|min:3|unique:bookings,booking_code',
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'room_id' => ['required'],
            'customer_id' => ['required'],
            'payment_type' => ['required', 'max:10']
        ];
    }
}
