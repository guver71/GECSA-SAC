<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ObraController;
use App\Http\Controllers\Admin\ExpedienteController;
use App\Http\Controllers\Admin\PerfilController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('obras', ObraController::class);
    Route::resource('expedientes', ExpedienteController::class);
    Route::resource('perfiles', PerfilController::class);
});
