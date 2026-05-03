<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// READ DATA
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

// READ DETAIL DATA
Route::get('/mahasiswa/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

// CREATE DATA
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

// EDIT DATA
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// DELETE DATA
