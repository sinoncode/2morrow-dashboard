<?php

namespace App\Services;

use App\Models\EmailMessage;

class EmailService
{
    public function create(array $data): EmailMessage
    {
        return EmailMessage::create($data);
    }

    public function update(EmailMessage $email, array $data): EmailMessage
    {
        $email->update($data);

        return $email;
    }
}
