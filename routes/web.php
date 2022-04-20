<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FallbackController;
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

// Enables verification
Auth::routes(['verify' => true]);

// Home Page
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Fallback Route - Overwrites 404 error
Route:: fallback(FallbackController::class);


