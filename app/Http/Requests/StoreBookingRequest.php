<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // adjust as needed for authorization logic
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'bookable_id' => ['required', 'integer'],
            'bookable_type' => ['required', 'string'],
            'booking_date' => ['required', 'date'],
            'booking_amount' => ['required', 'numeric'],
            'notes' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ];
    }
}
