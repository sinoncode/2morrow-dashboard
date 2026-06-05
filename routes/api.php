<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;

Route::get('/status', function () {
    return response()->json([
        'status' => 'ok',
        'app' => env('APP_NAME', 'Laravel'),
        'environment' => env('APP_ENV', 'local'),
    ]);
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('dashboard', DashboardController::class);

    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('agents', AgentController::class);
    Route::apiResource('properties', PropertyController::class);
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('leads', LeadController::class);
    Route::apiResource('requests', RequestController::class);
    Route::apiResource('activities', ActivityController::class);
    Route::apiResource('emails', EmailController::class);
});
