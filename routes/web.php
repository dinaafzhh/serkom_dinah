<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [BeritaController::class, 'landing'])->name('landing');
Route::get('/berita/{id}', [BeritaController::class, 'detail'])->name('berita.detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/profil', [ProfilController::class, 'index'])->name('admin.profil.profil');

Route::get('/user', [UserController::class, 'index'])->name('admin.user.user');
Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/user', [UserController::class, 'store'])->name('admin.user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
Route::put('/user/{id}', [UserController::class, 'update'])->name('admin.user.update');

Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru.guru');
Route::get('/guru/create', [GuruController::class, 'create'])->name('admin.guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('admin.guru.store');
Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('admin.guru.edit');
Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('admin.guru.update');
Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');

Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa.siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('admin.siswa.update');
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');

Route::get('/ektrakurikuler', [EkstrakurikulerController::class, 'index'])->name('admin.ektrakurikuler.ektrakurikuler');
Route::get('/ektrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('admin.ektrakurikuler.create');
Route::post('/ektrakurikuler', [EkstrakurikulerController::class, 'store'])->name('admin.ektrakurikuler.store');
Route::get('/ektrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('admin.ektrakurikuler.edit');
Route::put('/ektrakurikuler/{id}', [EkstrakurikulerController::class, 'update'])->name('admin.ektrakurikuler.update');
Route::delete('/ektrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('admin.ektrakurikuler.destroy');

Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.berita');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.galeri');
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
Route::post('/galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/galeri/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
Route::delete('/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
