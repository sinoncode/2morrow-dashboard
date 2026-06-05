<?php

namespace App\Services;

use App\Models\Agent;

class AgentService
{
    public function create(array $data): Agent
    {
        return Agent::create($data);
    }

    public function update(Agent $agent, array $data): Agent
    {
        $agent->update($data);

        return $agent;
    }
}
