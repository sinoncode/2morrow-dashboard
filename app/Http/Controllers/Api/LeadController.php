<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreLeadRequest;
use App\Http\Requests\Api\UpdateLeadRequest;
use App\Models\Lead;
use App\Services\LeadService;

class LeadController extends Controller
{
    protected LeadService $service;

    public function __construct(LeadService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Lead::all();
    }

    public function store(StoreLeadRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(Lead $lead)
    {
        return $lead;
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        return $this->service->update($lead, $request->validated());
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->noContent();
    }
}
