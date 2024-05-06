<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/admin/location', LocationController::class)->names('location');
    Route::resource('/admin/category', CategoryController::class)->names('category');
    Route::resource('/admin/asset', AssetController::class)->names('asset');
});

Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('');
Route::get('/auth/callback-url', [AuthController::class, 'callback'])->name('');