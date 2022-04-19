<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Fallback Route - Overwrites 404 error
Route:: fallback(FallbackController::class);


