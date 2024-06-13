<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DenahrakController;
use App\Http\Controllers\KapsrakController;
use App\Http\Controllers\KapsmaterialController;
use App\Http\Controllers\ProsdtgController;

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
    return view('Login.loginUser');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index']);
//Route::resource('/dashboard', DashboardController::class);
Route::middleware('auth')->resource('/denahrak', DenahrakController::class);
Route::resource('/kapsrak', KapsrakController::class);
Route::resource('/kapsmaterial', KapsmaterialController::class);
Route::resource('/prosdtg', ProsdtgController::class);
Route::get('/tambah-rak-form', [KapsrakController::class, 'create'])->name('kapsrak.create');
Route::get('/kapsrak/newrak', [KapsrakController::class, 'create'])->name('kapsrak.newrak');
Route::post('/kapsrak/store', [KapsrakController::class, 'store'])->name('kapsrak.store');
Route::delete('/kapsrak/destroy/{alamat}', [KapsrakController::class, 'destroy'])->name('kapsrak.destroy');
Route::get('/tambah-material-form', [KapsmaterialController::class, 'create'])->name('kapsmaterial.create');
Route::get('/kapsmaterial/newmaterial', [KapsmaterialController::class, 'create'])->name('kapsmaterial.newmaterial');
Route::post('/kapsmaterial/store', [KapsmaterialController::class, 'store'])->name('kapsmaterial.store');
Route::get('/search-material', [KapsmaterialController::class, 'searchMaterial']);
// Menampilkan formulir edit
Route::get('/edit/{qty}', [KapsmaterialController::class, 'edit'])->name('kapsmaterial.edit');
// Menyimpan perubahan setelah edit
Route::put('/kapsmaterial/update/{qty}', [KapsmaterialController::class, 'update'])->name('kapsmaterial.update');
Route::delete('/kapsmaterial/{id}', 'KapsmaterialController@destroy')->name('kapsmaterial.destroy');
//Route::get('/kapsrak/index', [KapsrakController::class, 'index']);
Route::get('/kapsrak/getdata', [KapsrakController::class, 'getdata'])->name("kapsrak.getdata");