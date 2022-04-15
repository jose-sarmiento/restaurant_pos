<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryMenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
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

Route::resource('customers', CustomerController::class,['except' => ['create', 'edit']]);
Route::resource('categories', CategoryController::class,['except' => ['create', 'edit']]);
Route::resource('categories.menus', CategoryMenuController::class,['only' => ['index']]);
Route::resource('menus', MenuController::class,['except' => ['create', 'edit']]);
