<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DenahrakController;
use App\Http\Controllers\KapsrakController;
use App\Http\Controllers\KapsmaterialController;

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

Route::get('/', function () {
    return view('template');
});
Route::resource('/dashboard', DashboardController::class);
Route::resource('/denahrak', DenahrakController::class);
Route::resource('/kapsrak', KapsrakController::class);
Route::resource('/kapsmaterial', KapsmaterialController::class);
