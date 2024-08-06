<?php

use App\Http\Controllers\BoatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\BoatsIndex;
use App\Livewire\UsersIndex;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShipTravelController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

    Route::resource('boats', BoatController::class)->only(['index', 'edit', 'update'])->names('boats');

    Route::resource('suppliers', SupplierController::class)->names('suppliers');

    Route::resource('roles', RoleController::class)->names('roles');

    Route::resource('persons', PersonController::class)->names('persons');

    Route::resource('shiptravel', ShipTravelController::class)->names('shiptravel');

    Route::resource('movements', MovementController::class)->names('movements');

    Route::resource('clients', ClientController::class)->names('clients');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users-index', UsersIndex::class);

    Route::get('boats-index', BoatsIndex::class);

    Route::get('shiptravels/{ship_travel_id}/movements', [MovementController::class, 'create_update_movements'])->name('shiptravels.movements');
});


Auth::routes();
