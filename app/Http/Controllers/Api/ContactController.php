<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreContactRequest;
use App\Http\Requests\Api\UpdateContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected ContactService $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Contact::all();
    }

    public function store(StoreContactRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(Contact $contact)
    {
        return $contact;
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        return $this->service->update($contact, $request->validated());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->noContent();
    }
}
