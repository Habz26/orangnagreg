<?php
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Bangunan;
use App\Models\Tanah;
use App\Models\Ruangan;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/barang', [ BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [ BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [ BarangController::class, 'store'])->name('barang.store');

Route::get('/ruangan', function () {
    return view('ruangan', [
        'title' => 'Ruangan',
        'items' => Ruangan::all(),
    ]);
});

Route::get('/tanah', function () {
    return view('tanah', [
        'title' => 'Tanah',
        'items' => Tanah::all(),
    ]);
});

Route::get('/bangunan', function () {
    return view('bangunan', [
        'title' => 'Bangunan',
        'items' => Bangunan::all(),
    ]);
});

Route::get('/kategori', function () {
    return view('kategori', [
        'title' => 'Kategori',
        'items' => Kategori::all(),
    ]);
});