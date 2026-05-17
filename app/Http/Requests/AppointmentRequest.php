<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'patient_name'   => 'required|string|max:100',
            'phone'          => 'required|regex:/^(\+92|0)[0-9]{10}$/',
            'email'          => 'nullable|email',
            'department_id'  => 'required|exists:departments,id',
            'service_id'     => 'nullable|exists:services,id',
            'preferred_date' => 'required|date|after:today',
            'message'        => 'nullable|string|max:500',
        ];
    }
}
