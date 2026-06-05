<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePermissionRequest;
use App\Http\Requests\Api\UpdatePermissionRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService)
    {
    }

    public function index(Request $request)
    {
        $this->authorizePermission($request, 'manage_permissions');

        return Permission::all();
    }

    public function store(StorePermissionRequest $request)
    {
        $this->authorizePermission($request, 'manage_permissions');

        return $this->permissionService->create($request->validated());
    }

    public function show(Request $request, Permission $permission)
    {
        $this->authorizePermission($request, 'manage_permissions');

        return $permission;
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $this->authorizePermission($request, 'manage_permissions');

        return $this->permissionService->update($permission, $request->validated());
    }

    public function destroy(Request $request, Permission $permission)
    {
        $this->authorizePermission($request, 'manage_permissions');

        $permission->roles()->detach();
        $permission->delete();

        return response()->noContent();
    }
}
