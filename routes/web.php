<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GlossaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::match(['put', 'patch'], '/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');


    Route::get('/glossary', [GlossaryController::class, 'index'])->name('glossary');
    Route::get('/glossary/{id}/edit', [GlossaryController::class, 'edit'])->name('glossary.edit');
    Route::put('/glossary/{id}', [GlossaryController::class, 'update'])->name('glossary.update');




    Route::get('/equipments', [EquipmentController::class, 'index'])->name('equipments');
    Route::get('/equipments/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::match(['put', 'patch'], '/equipments/{equipment}', [EquipmentController::class, 'update'])->name('equipment.update');



});



require __DIR__ . '/auth.php';