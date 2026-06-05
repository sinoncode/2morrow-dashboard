<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'from_email' => 'required|email',
            'to_email' => 'required|email',
            'status' => 'nullable|string|max:50',
            'sent_at' => 'nullable|date',
            'attachments' => 'nullable|string',
        ];
    }
}
