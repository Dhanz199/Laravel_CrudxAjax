<?php

use App\Http\Controllers\BarangController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/', BarangController::class);
Route::get('barang', [BarangController::class, 'index'])->name('barang');
Route::get('barang/records', [BarangController::class, 'records'])->name('barang/records');
Route::post('barang/store', [BarangController::class, 'store'])->name('store');
Route::get('barang/edit/{id}', [BarangController::class, 'edit'])->name('edit');
Route::put('barang/update/{id}', [BarangController::class, 'update'])->name('update');
Route::delete('barang/{id}', [BarangController::class, 'destroy'])->name('destroy');

