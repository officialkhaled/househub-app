<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');


    // Settings
    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::resource('', PermissionController::class);
        Route::get('{permissionId}/delete', [PermissionController::class, 'destroy']);
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::resource('', RoleController::class);
        Route::get('{roleId}/delete', [RoleController::class, 'destroy']);
        Route::get('{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
        Route::put('{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::resource('', UserController::class);
        Route::get('{userId}/delete', [UserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
