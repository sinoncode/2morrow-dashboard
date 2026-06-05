<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_phone' => 'nullable|string|max:50',
            'request_type' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'budget_min' => 'nullable|numeric',
            'budget_max' => 'nullable|numeric',
            'city' => 'nullable|string|max:100',
            'property_type' => 'nullable|string|max:100',
            'criteria' => 'nullable|string',
            'notes' => 'nullable|string',
            'agent_id' => 'nullable|exists:agents,id',
        ];
    }
}
