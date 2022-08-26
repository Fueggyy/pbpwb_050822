<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaContoller;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KartuPelajarController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/', [SiswaContoller::class, 'index'])->name('index');

    Route::resource('siswa', SiswaContoller::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('kartu', KartuPelajarController::class);
});
