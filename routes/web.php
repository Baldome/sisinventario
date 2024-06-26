<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
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
    Route::get('/admin/asset/{id}/assign-asset-to-user', [AssetController::class, 'createAssignAssetToUser'])->name('asset.createAssignAssetToUser');
    Route::put('/admin/asset/{id}/assign-asset-to-user', [AssetController::class, 'assignAssetToUser'])->name('asset.assignAssetToUser');

    Route::resource('/admin/permission', PermissionController::class)->names('permission');

    Route::resource('/admin/role', RoleController::class)->names('role');
    Route::get('/admin/role/{id}/assign-permissions-to-role', [RoleController::class, 'createPermissionsToRole'])->name('role.createPermissionsToRole');
    Route::put('/admin/role/{id}/assign-permissions-to-role', [RoleController::class, 'assignPermissionsToRole'])->name('role.assignPermissionsToRole');
    Route::get('/admin/role/{role}/permissions', [RoleController::class, 'getPermissions']);

    Route::resource('/admin/user', UserController::class)->names('user');

    Route::resource('/admin/units', UnitController::class)->names('units');

    Route::resource('/admin/tools', ToolController::class)->names('tools');
    Route::get('/admin/tools/{id}/assign-tool-to-user', [ToolController::class, 'createAssignToolToUser'])->name('tools.createAssignToolToUser');
    Route::put('/admin/tools/{id}/assign-tool-to-user', [ToolController::class, 'assignToolToUser'])->name('tools.assignToolToUser');

    Route::resource('/admin/loans', LoanController::class)->except(['create'])->names('loans');
    Route::get('/admin/loans/create/{id}', [LoanController::class, 'create'])->name('loans.create');
    Route::get('/admin/prestamos/devolucion', [LoanController::class, 'return'])->name('loans.return');

    Route::resource('/admin/settings', SettingController::class)->names('settings');
});
