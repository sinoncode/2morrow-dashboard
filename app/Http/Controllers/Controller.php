<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected function authorizePermission(Request $request, string $permission): void
    {
        abort_unless(
            $request->user() && $request->user()->hasPermission($permission),
            Response::HTTP_FORBIDDEN,
            'Forbidden'
        );
    }

    protected function authorizeRole(Request $request, string $role): void
    {
        abort_unless(
            $request->user() && $request->user()->hasRole($role),
            Response::HTTP_FORBIDDEN,
            'Forbidden'
        );
    }
}
