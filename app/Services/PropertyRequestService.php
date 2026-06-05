<?php

namespace App\Services;

use App\Models\PropertyRequest;

class PropertyRequestService
{
    public function create(array $data): PropertyRequest
    {
        return PropertyRequest::create($data);
    }

    public function update(PropertyRequest $requestRecord, array $data): PropertyRequest
    {
        $requestRecord->update($data);

        return $requestRecord;
    }
}
