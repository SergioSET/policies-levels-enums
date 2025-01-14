<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLevelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardContribuidor', function () {
    return view('dashboardContribuidor');
})->middleware(['auth', 'verified'])->name('dashboardContribuidor');

Route::get('/dashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified'])->name('dashboardAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('users.index');

Route::get('/users/{user}/edit', [UserLevelController::class, 'edit'])
    ->middleware(['auth'])
    ->name('userlevels.edit');

Route::put('/users/{user}', [UserLevelController::class, 'update'])
    ->middleware(['auth'])
    ->name('userlevels.update');

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('users.destroy');

require __DIR__.'/auth.php';
