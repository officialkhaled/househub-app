<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\PermissionController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Settings
    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('', [PermissionController::class, 'index'])->name('index');
        Route::get('/create', [PermissionController::class, 'create'])->name('create');
        Route::post('', [PermissionController::class, 'store'])->name('store');
        Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('edit');
        Route::put('{permission}', [PermissionController::class, 'update'])->name('update');
        Route::delete('{permission}', [PermissionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('', [RoleController::class, 'store'])->name('store');
        Route::get('{role}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::put('{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('{role}', [RoleController::class, 'destroy'])->name('destroy');
        Route::get('{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
        Route::put('{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('', [UserController::class, 'store'])->name('store');
        Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('{user}', [UserController::class, 'update'])->name('update');
        Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
