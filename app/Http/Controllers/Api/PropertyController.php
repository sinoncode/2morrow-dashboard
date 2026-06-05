<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePropertyRequest;
use App\Http\Requests\Api\UpdatePropertyRequest;
use App\Models\Property;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    protected PropertyService $service;

    public function __construct(PropertyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Property::all();
    }

    public function store(StorePropertyRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(Property $property)
    {
        return $property;
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        return $this->service->update($property, $request->validated());
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return response()->noContent();
    }
}
