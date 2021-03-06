<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryMenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customers/search', [CustomerController::class, 'search']);
Route::resource('customers', CustomerController::class,['except' => ['create', 'edit']]);

Route::resource('categories', CategoryController::class,['except' => ['create', 'edit']]);
Route::resource('categories.menus', CategoryMenuController::class,['only' => ['index']]);

Route::get('menus/search', [MenuController::class, 'search']);
Route::resource('menus', MenuController::class,['except' => ['create', 'edit']]);

Route::resource('orders', OrderController::class,['except' => ['create', 'edit']]);

Route::get('/dashboard', [DashboardController::class, 'index']);