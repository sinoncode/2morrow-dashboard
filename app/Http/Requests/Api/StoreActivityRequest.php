<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date',
            'agent_id' => 'nullable|exists:agents,id',
            'contact_id' => 'nullable|exists:contacts,id',
            'request_id' => 'nullable|exists:requests,id',
            'property_id' => 'nullable|exists:properties,id',
            'notes' => 'nullable|string',
        ];
    }
}
