<?php
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Bangunan;
use App\Models\Tanah;
use App\Models\Ruangan;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/barang', [ BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [ BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [ BarangController::class, 'store'])->name('barang.store');


Route::resource('kategori', KategoriController::class)->names('kategori');

// Route::get('/ruangan', [ RuanganController::class, 'index'])->name('ruangan.index');
// Route::get('/ruangan/create', [ RuanganController::class, 'create'])->name('ruangan.create');
// Route::post('/ruangan', [ RuanganController::class, 'store'])->name('ruangan.store');

Route::get('/ruangan', function () {
    return view('ruangan.index', [
        'title' => 'Ruangan',
        'items' => Ruangan::all(),
    ]);
});

Route::get('/tanah', function () {
    return view('tanah.index', [
        'title' => 'Tanah',
        'items' => Tanah::all(),
    ]);
});

Route::get('/bangunan', function () {
    return view('bangunan.index', [
        'title' => 'Bangunan',
        'items' => Bangunan::all(),
    ]);
});