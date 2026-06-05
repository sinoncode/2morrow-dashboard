<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function create(array $data): Role
    {
        $role = Role::create($data);

        if (! empty($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return $role;
    }

    public function update(Role $role, array $data): Role
    {
        $role->update($data);

        if (array_key_exists('permissions', $data)) {
            $role->permissions()->sync($data['permissions'] ?? []);
        }

        return $role;
    }
}
