<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
    public function create(array $data): Permission
    {
        return Permission::create($data);
    }

    public function update(Permission $permission, array $data): Permission
    {
        $permission->update($data);

        return $permission;
    }
}
