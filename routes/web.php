<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaContoller;
use App\Http\Controllers\PegawaiController;

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

Route::controller(SiswaContoller::class)->group(function () {
    Route::get('siswa', 'index')->name('siswa');
    Route::get('siswa/tambah', 'create')->name('siswa.tambah');
    Route::get('siswa/{nis}', 'destroy')->name('siswa.hapus');
    Route::get('siswa/show/{nis}', 'show')->name('siswa.show');
    Route::post('siswa/tambah/save', 'store')->name('siswa.tambah.save');
    Route::post('siswa/edit', 'update')->name('siswa.edit');
});

Route::controller(PegawaiController::class)->group(function () {
    Route::get('pegawai', 'index')->name('pegawai');
    Route::get('pegawai/tambah', 'create')->name('pegawai.tambah');
    Route::get('pegawai/{nip}', 'destroy')->name('pegawai.hapus');
    Route::get('pegawai/show/{nip}', 'show')->name('pegawai.show');
    Route::post('pegawai/tambah/save', 'store')->name('pegawai.tambah.save');
    Route::post('pegawai/edit', 'update')->name('pegawai.edit');

});

