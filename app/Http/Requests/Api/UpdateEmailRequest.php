<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'from_email' => 'sometimes|required|email',
            'to_email' => 'sometimes|required|email',
            'status' => 'nullable|string|max:50',
            'sent_at' => 'nullable|date',
            'attachments' => 'nullable|string',
        ];
    }
}
