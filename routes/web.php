<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\WardAdmin\NewMemberController;
use App\Http\Controllers\SuperAdmin\SuperAdminUserController;
use App\Http\Controllers\WardAdmin\WardAdminDashboardController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\UnionAdmin\UnionAdminDashboardController;
use App\Http\Controllers\UpozilaAdmin\UpozilaAdminDashboardController;
use App\Http\Controllers\DistrictAdmin\DistrictAdminDashboardController;

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

Route::get('user/list', [SuperAdminUserController::class, 'userList'])->name('user.list');
Route::get('/get-districts/{division_id}', [LocationController::class, 'getDistricts']);

Route::middleware(['role:super_admin'])->group(function () {
    Route::prefix('super-admin')->name('super.admin.')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    });

});

Route::middleware(['role:dis_admin'])->group(function () {
    Route::prefix('district')->name('district.')->group(function () {
        Route::get('/dashboard', [DistrictAdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:upo_admin'])->group(function () {
    Route::prefix('upozila')->name('upozila.')->group(function () {
        Route::get('/dashboard', [UpozilaAdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:uni_admin'])->group(function () {
    Route::prefix('union')->name('union.')->group(function () {
        Route::get('/dashboard', [UnionAdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:ward_admin'])->prefix('ward-admin')->name('ward.')->group(function () {
    Route::prefix('ward')->name('ward.')->group(function () {
        Route::get('/dashboard', [WardAdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/new-members', NewMemberController::class);
    });
});
require __DIR__.'/auth.php';
