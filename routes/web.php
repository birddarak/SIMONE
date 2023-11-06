<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DpaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::resource('dpa', DpaController::class);
    
    Route::resource('program', ProgramController::class)->parameter('program', 'program:uuid');

    Route::resource('user', UserController::class)->parameter('user', 'user:uuid');

    Route::resource('pegawai', PegawaiController::class)->parameter('pegawai', 'pegawai:uuid');
});
