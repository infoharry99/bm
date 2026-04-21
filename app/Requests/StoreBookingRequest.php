<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country_code' => 'required|string|max:5',
            'booking_date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string',
            'timezone' => 'required|string',
            'variant' => 'required|string',
            'duration' => 'required|integer|min:1',
            'location' => 'required|string',
            'preference' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Phone number is required',
            'booking_date.required' => 'Booking date is required',
            'booking_date.after_or_equal' => 'Booking date must be today or in the future',
            'time_slot.required' => 'Time slot is required',
        ];
    }
}