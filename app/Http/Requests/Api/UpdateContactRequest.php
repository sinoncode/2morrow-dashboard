<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $contactId = $this->route('contact')->id;

        return [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:contacts,email,' . $contactId,
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:100',
            'language' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ];
    }
}
