<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreActivityRequest;
use App\Http\Requests\Api\UpdateActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;

class ActivityController extends Controller
{
    protected ActivityService $service;

    public function __construct(ActivityService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Activity::all();
    }

    public function store(StoreActivityRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(Activity $activity)
    {
        return $activity;
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        return $this->service->update($activity, $request->validated());
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return response()->noContent();
    }
}
