<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRequestRequest;
use App\Http\Requests\Api\UpdateRequestRequest;
use App\Models\PropertyRequest;
use App\Services\PropertyRequestService;

class RequestController extends Controller
{
    protected PropertyRequestService $service;

    public function __construct(PropertyRequestService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return PropertyRequest::all();
    }

    public function store(StoreRequestRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(PropertyRequest $requestRecord)
    {
        return $requestRecord;
    }

    public function update(UpdateRequestRequest $request, PropertyRequest $requestRecord)
    {
        return $this->service->update($requestRecord, $request->validated());
    }

    public function destroy(PropertyRequest $requestRecord)
    {
        $requestRecord->delete();

        return response()->noContent();
    }
}
