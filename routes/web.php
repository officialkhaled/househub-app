<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommonApiController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\RenterFlatAssignController;
use App\Http\Controllers\Settings\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/maintenance-mode', function () {
//    return view('pages.maintenance');
//});

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::get('/get-floors', [CommonApiController::class, 'getFloors'])->name('get-floors');
    Route::get('/get-flats', [CommonApiController::class, 'getFlats'])->name('get-flats');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => 'buildings', 'as' => 'buildings.'], function () {
        Route::get('', [BuildingController::class, 'index'])->name('index');
        Route::get('/create', [BuildingController::class, 'create'])->name('create');
        Route::post('', [BuildingController::class, 'store'])->name('store');
        Route::get('{building}/edit', [BuildingController::class, 'edit'])->name('edit');
        Route::put('{building}', [BuildingController::class, 'update'])->name('update');
        Route::delete('{building}', [BuildingController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'floors', 'as' => 'floors.'], function () {
        Route::get('', [FloorController::class, 'index'])->name('index');
        Route::get('/create', [FloorController::class, 'create'])->name('create');
        Route::post('', [FloorController::class, 'store'])->name('store');
        Route::get('{floor}/edit', [FloorController::class, 'edit'])->name('edit');
        Route::put('{floor}', [FloorController::class, 'update'])->name('update');
        Route::delete('{floor}', [FloorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'flats', 'as' => 'flats.'], function () {
        Route::get('', [FlatController::class, 'index'])->name('index');
        Route::get('/create', [FlatController::class, 'create'])->name('create');
        Route::post('', [FlatController::class, 'store'])->name('store');
        Route::get('{flat}/edit', [FlatController::class, 'edit'])->name('edit');
        Route::put('{flat}', [FlatController::class, 'update'])->name('update');
        Route::delete('{flat}', [FlatController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'utilities', 'as' => 'utilities.'], function () {
        Route::get('', [UtilityController::class, 'index'])->name('index');
        Route::get('/create', [UtilityController::class, 'create'])->name('create');
        Route::post('', [UtilityController::class, 'store'])->name('store');
        Route::get('{utility}/edit', [UtilityController::class, 'edit'])->name('edit');
        Route::put('{utility}', [UtilityController::class, 'update'])->name('update');
        Route::delete('{utility}', [UtilityController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'renters', 'as' => 'renters.'], function () {
        Route::get('', [RenterController::class, 'index'])->name('index');
        Route::get('/create', [RenterController::class, 'create'])->name('create');
        Route::post('', [RenterController::class, 'store'])->name('store');
        Route::get('{renter}/edit', [RenterController::class, 'edit'])->name('edit');
        Route::put('{renter}', [RenterController::class, 'update'])->name('update');
        Route::delete('{renter}', [RenterController::class, 'destroy'])->name('destroy');
    });


    // Configurations
    Route::group(['prefix' => 'renter-flat-assign', 'as' => 'renter-flat-assign.'], function () {
        Route::get('', [RenterFlatAssignController::class, 'index'])->name('index');
        Route::get('/create', [RenterFlatAssignController::class, 'create'])->name('create');
        Route::post('', [RenterFlatAssignController::class, 'store'])->name('store');
        Route::get('{renterFlatAssign}/edit', [RenterFlatAssignController::class, 'edit'])->name('edit');
        Route::put('{renterFlatAssign}', [RenterFlatAssignController::class, 'update'])->name('update');
        Route::delete('{renterFlatAssign}', [RenterFlatAssignController::class, 'destroy'])->name('destroy');
    });


    // Invoices
    Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
        Route::get('', [InvoiceController::class, 'index'])->name('index');
        Route::post('generate-invoice', [InvoiceController::class, 'generateInvoice'])->name('generate-invoice');
        Route::delete('{invoice}', [InvoiceController::class, 'destroy'])->name('destroy');
    });


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


    // Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
