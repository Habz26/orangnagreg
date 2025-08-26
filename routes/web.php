<?php
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Bangunan;
use App\Models\Tanah;
use App\Models\Ruangan;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\RuanganController; // --- IGNORE ---    
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/barang', [ BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [ BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [ BarangController::class, 'store'])->name('barang.store');


Route::resource('kategori', KategoriController::class)->names('kategori');

Route::resource('user', UserCotroller::class)->names('user');
Route::resource('/tanah', TanahController::class)->names('tanah');

// Route::get('/ruangan', [ RuanganController::class, 'index'])->name('ruangan.index');
// Route::get('/ruangan/create', [ RuanganController::class, 'create'])->name('ruangan.create');
// Route::post('/ruangan', [ RuanganController::class, 'store'])->name('ruangan.store');

Route::get('/ruangan', function () {
    return view('ruangan.index', [
        'title' => 'Ruangan',
        'items' => Ruangan::all(),
    ]);
});


Route::get('/bangunan', function () {
    return view('bangunan.index', [
        'title' => 'Bangunan',
        'items' => Bangunan::all(),
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('user', UserCotroller::class)->names('user');
});

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');