<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MakananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PakaianController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', [ObatController::class, 'homepage']);
Route::get('/obat', [ObatController::class, 'index'])->middleware('auth')->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::put('/obat/{id}', [ObatController::class, 'update'])->middleware('auth') ->name('obat.update');
Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');
Route::post('/obat', [ObatController::class, 'store'])->middleware('auth')->name('obat.store');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->middleware('auth')->name('obat.edit');
Route::delete('/obat/{id}/delete', [ObatController::class, 'destroy'])->middleware('auth')->name('obat.destroy');

Route::get('/makanan', [MakananController::class, 'index'])->middleware('auth')->name('makanan.index');
Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
Route::post('/makanan', [MakananController::class, 'store'])->middleware('auth')->name('makanan.store');
Route::get('/makanan/{id}/edit', [MakananController::class, 'edit'])->middleware('auth')->name('makanan.edit');
Route::put('/makanan/{id}', [MakananController::class, 'update'])->middleware('auth')->name('makanan.update');
Route::delete('/makanan/{id}/delete', [MakananController::class, 'destroy'])->middleware('auth')->name('makanan.destroy');
Route::get('/makanan/{id}', [MakananController::class, 'show'])->name('makanan.show');

Route::get('/kategori', [KategoriController::class, 'index'])->middleware('auth')->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->middleware('auth')->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->middleware('auth')->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->middleware('auth')->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->middleware('auth')->name('kategori.destroy');

Route::get('/pakaian', [PakaianController::class, 'index'])->middleware('auth')->name('pakaian.index');
Route::get('/pakaian/create', [PakaianController::class, 'create'])->name('pakaian.create');
Route::get('/pakaian/{id}', [PakaianController::class, 'show'])->name('pakaian.show');
Route::post('/pakaian', [PakaianController::class, 'store'])->middleware('auth')->name('pakaian.store');
Route::get('/pakaian/{id}/edit', [PakaianController::class, 'edit'])->middleware('auth')->name('pakaian.edit');
Route::put('/pakaian/{id}', [PakaianController::class, 'update'])->middleware('auth')->name('pakaian.update');
Route::delete('/pakaian/{id}/delete', [PakaianController::class, 'destroy'])->middleware('auth')->name('pakaian.destroy');
