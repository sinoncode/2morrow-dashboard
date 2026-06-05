<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEmailRequest;
use App\Http\Requests\Api\UpdateEmailRequest;
use App\Models\EmailMessage;
use App\Services\EmailService;

class EmailController extends Controller
{
    protected EmailService $service;

    public function __construct(EmailService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return EmailMessage::all();
    }

    public function store(StoreEmailRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(EmailMessage $email)
    {
        return $email;
    }

    public function update(UpdateEmailRequest $request, EmailMessage $email)
    {
        return $this->service->update($email, $request->validated());
    }

    public function destroy(EmailMessage $email)
    {
        $email->delete();

        return response()->noContent();
    }
}
