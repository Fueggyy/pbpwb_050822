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

Route::get('siswa', function () {
    return view('siswa.index');
});

Route::get('siswa', [SiswaContoller::class, 'index'])->name('siswa');
Route::get('siswa/tambah', [SiswaContoller::class, 'create'])->name('siswa.tambah');
Route::get('siswa/{nis}', [SiswaContoller::class, 'destroy'])->name('siswa.hapus');
Route::get('siswa/show/{nis}', [SiswaContoller::class, 'show'])->name('siswa.show');
Route::post('siswa/tambah/save', [SiswaContoller::class, 'store'])->name('siswa.tambah.save');
Route::post('siswa/edit', [SiswaContoller::class, 'update'])->name('siswa.edit');

Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
