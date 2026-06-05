<?php

namespace App\Services;

use App\Models\Property;

class PropertyService
{
    public function create(array $data): Property
    {
        return Property::create($data);
    }

    public function update(Property $property, array $data): Property
    {
        $property->update($data);

        return $property;
    }
}
