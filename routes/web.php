<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DpaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RealisasiController;
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

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('dpa', DpaController::class);
    Route::get('dpa/{program:uuid}/kegiatan', [DpaController::class, 'dpa_kegiatan'])->name('dpa.kegiatan');
    Route::get('dpa/{kegiatan:uuid}/subkegiatan', [DpaController::class, 'dpa_subkegiatan'])->name('dpa.subkegiatan');

    Route::resource('program', ProgramController::class)->parameter('program', 'program:uuid');

    Route::resource('pegawai', PegawaiController::class)->parameter('pegawai', 'pegawai:uuid');

    Route::resource('realisasi', RealisasiController::class);
    Route::get('realisasi/{program:uuid}/kegiatan', [RealisasiController::class, 'realisasi_kegiatan'])->name('realisasi.kegiatan');
    Route::get('realisasi/{kegiatan:uuid}/subkegiatan', [RealisasiController::class, 'realisasi_subkegiatan'])->name('realisasi.subkegiatan');
    
});
