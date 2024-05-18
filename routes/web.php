<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('/admin/location', LocationController::class)->names('location');

    Route::resource('/admin/category', CategoryController::class)->names('category');

    Route::resource('/admin/asset', AssetController::class)->names('asset');
    Route::get('/admin/asset/assign/createAssignAssetToUser', [AssetController::class, 'createAssignAssetToUser'])->name('asset.createAssignAssetToUser');
    Route::put('/admin/asset', [AssetController::class, 'assignAssetToUser'])->name('asset.assignAssetToUser');

    Route::resource('/admin/permission', PermissionController::class)->names('permission');

    Route::resource('/admin/role', RoleController::class)->names('role');
    Route::get('/admin/role/{id}/assign-permissions-to-role', [RoleController::class, 'createPermissionsToRole'])->name('role.createPermissionsToRole');
    Route::put('/admin/role/{id}/assign-permissions-to-role', [RoleController::class, 'assignPermissionsToRole'])->name('role.assignPermissionsToRole');

    Route::resource('/admin/user', UserController::class)->names('user');
});

Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('');
Route::get('/auth/callback-url', [AuthController::class, 'callback'])->name('');