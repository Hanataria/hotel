<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;

use Maatwebsite\Excel\Facades\Excel;



Route::get('/', [ReservasiController::class, 'index'])->name('welcome');

Route::post('/tambah-data-reservasi', [ReservasiController::class, 'store'])->name('welcome.store');
Route::get('/edit-data-reservasi/{id}', [ReservasiController::class, 'edit'])->name('welcome.edit');
Route::put('/update-data-reservasi/{id}', [ReservasiController::class, 'update'])->name('welcome.update');
Route::delete('/hapus-data-reservasi/{id}', [ReservasiController::class, 'destroy'])->name('welcome.destroy');

