<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAgentRequest;
use App\Http\Requests\Api\UpdateAgentRequest;
use App\Models\Agent;
use App\Services\AgentService;

class AgentController extends Controller
{
    protected AgentService $service;

    public function __construct(AgentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Agent::all();
    }

    public function store(StoreAgentRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function show(Agent $agent)
    {
        return $agent;
    }

    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        return $this->service->update($agent, $request->validated());
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();

        return response()->noContent();
    }
}
