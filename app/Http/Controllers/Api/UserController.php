<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index(Request $request)
    {
        $this->authorizePermission($request, 'manage_users');

        return User::with('roles.permissions')->get();
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorizePermission($request, 'manage_users');

        $user = $this->userService->create($request->validated());

        return $user->load('roles.permissions');
    }

    public function show(User $user)
    {
        return $user->load('roles');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $this->userService->update($user, $request->validated());

        return $user->load('roles.permissions');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }
}
