<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\DistrictAdmin\DistrictAdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\SuperAdminUserController;
use App\Http\Controllers\UnionAdmin\UnionAdminDashboardController;
use App\Http\Controllers\UpozilaAdmin\UpozilaAdminDashboardController;
use App\Http\Controllers\WardAdmin\WardAdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:super_admin'])->group(function () {
    Route::get('/dashboard/super-admin', [SuperAdminDashboardController::class, 'index']);
    Route::get('user/list', [SuperAdminUserController::class, 'userList'])->name('user.list');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminDashboardController::class, 'index']);
});

Route::middleware(['role:dis_admin'])->group(function () {
    Route::get('/dashboard/district-admin', [DistrictAdminDashboardController::class, 'index']);
});

Route::middleware(['role:upo_admin'])->group(function () {
    Route::get('/dashboard/upozila-admin', [UpozilaAdminDashboardController::class, 'index']);
});

Route::middleware(['role:uni_admin'])->group(function () {
    Route::get('/dashboard/union-admin', [UnionAdminDashboardController::class, 'index']);
});

Route::middleware(['role:ward_admin'])->group(function () {
    Route::get('/dashboard/ward-admin', [WardAdminDashboardController::class, 'index']);
});
require __DIR__.'/auth.php';
