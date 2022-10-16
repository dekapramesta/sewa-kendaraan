<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenyetujuContoller;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('LoginExc', [AuthController::class, 'LoginAction'])->name('Login.action');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'CekLevel:1']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('pemesanan', [AdminController::class, 'pemesanan'])->name('admin.pemesanan');
    Route::post('pemesanan', [AdminController::class, 'savePemesanan'])->name('admin.tambahsewa');
    Route::post('selesai', [AdminController::class, 'selesai'])->name('admin.selesaisewa');
    Route::get('sewa-export', [AdminController::class, 'export'])->name('admin.export');
});
Route::group(['prefix' => 'penyetuju', 'middleware' => ['auth', 'CekLevel:2']], function () {
    Route::get('dashboard', [PenyetujuContoller::class, 'index'])->name('penyetuju');
    Route::post('sewa', [PenyetujuContoller::class, 'setuju'])->name('penyetuju.tambahsewa');
});
Route::get('Logout', [AuthController::class, 'Logout'])->name('Logout');
