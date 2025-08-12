<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Or add your custom logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'bookable_id' => ['sometimes', 'integer'],
            'bookable_type' => ['sometimes', 'string'],
            'booking_date' => ['sometimes', 'date'],
            'booking_amount' => ['sometimes', 'numeric'],
            'notes' => ['nullable', 'string'],
            'status' => ['sometimes', 'string'],
        ];
    }
}
