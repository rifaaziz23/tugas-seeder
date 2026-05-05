<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('mahasiswa')->group(function () {
    // READ DATA
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

    // READ DETAIL DATA
    Route::get('/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

    // CREATE DATA
    Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

    // EDIT DATA
    Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

    // DELETE DATA
    Route::get('/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
});

