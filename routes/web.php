<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardEvidenController;
use App\Http\Controllers\DashboardInputFotoController;
use App\Http\Controllers\DashboardPelurusanController;
use App\Http\Controllers\GoogleSheetAPIController;

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

// Public
Route::get('/', [HomeController::class, 'index'])->name('index');

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::resource('/admin/dashboard/input_foto', DashboardInputFotoController::class)->except([
    'create', 'show', 'destroy'
]);
Route::resource('/admin/dashboard/eviden', DashboardEvidenController::class)
    ->except([
        'create', 'store', 'destroy', 'update'
    ]);
Route::resource('/admin/dashboard/pelurusan', DashboardPelurusanController::class)->except([
    'create', 'store', 'destroy'
]);
Route::resource('admin/dashboard/rekon', GoogleSheetAPIController::class)->except([
    'create', 'store', 'destroy', 'edit', 'update'
]);
Route::get('/admin/bantuan', [AdminController::class, 'bantuan'])->name('bantuan');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
