<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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



Route::get('index', [Controller::class, 'index']);
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [AuthController::class, 'googleCallback'])->name('google.callback');