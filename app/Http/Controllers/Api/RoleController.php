<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRoleRequest;
use App\Http\Requests\Api\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private RoleService $roleService)
    {
    }

    public function index(Request $request)
    {
        $this->authorizePermission($request, 'manage_roles');

        return Role::with('permissions')->get();
    }

    public function store(StoreRoleRequest $request)
    {
        $this->authorizePermission($request, 'manage_roles');

        $role = $this->roleService->create($request->validated());

        return $role->load('permissions');
    }

    public function show(Request $request, Role $role)
    {
        $this->authorizePermission($request, 'manage_roles');

        return $role->load('permissions');
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorizePermission($request, 'manage_roles');

        $role = $this->roleService->update($role, $request->validated());

        return $role->load('permissions');
    }

    public function destroy(Request $request, Role $role)
    {
        $this->authorizePermission($request, 'manage_roles');

        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();

        return response()->noContent();
    }
}
