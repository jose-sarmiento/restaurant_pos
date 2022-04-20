<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

// controllers temporary return json response while frontend not yet ready
Route::get('customers/search', [CustomerController::class, 'search']);
Route::resource('customers', CustomerController::class);

Route::resource('categories', CategoryController::class);
Route::resource('categories.menus', CategoryMenuController::class,['only' => ['index']]);

Route::get('menus/search', [MenuController::class, 'search']);
Route::resource('menus', MenuController::class);

Route::resource('orders', OrderController::class);

// Fallback Route - Overwrites 404 error
Route:: fallback(FallbackController::class);


