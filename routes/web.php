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
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\BangunanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardUserController::class, 'index'])->name('dashboarduser');


Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_src()]);
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserCotroller::class)->names('user');

    // Route yang bisa diakses admin dan user
    Route::middleware('role:1')->group(function () {
        Route::resource('/tanah', TanahController::class)->names('tanah');
        Route::resource('/bangunan', BangunanController::class)->names('bangunan');
        Route::resource('/ruangan', RuanganController::class)->names('ruangan');
        Route::resource('/kategori', KategoriController::class)->names('kategori');
        Route::resource('/barang', BarangController::class)->names('barang');
        Route::resource('/user', UserCotroller::class)->names('user');
    });
});

Route::get('/tanah', [TanahController::class, 'index'])->name('tanah.index');
Route::get('/bangunan', [BangunanController::class, 'index'])->name('bangunan.index');
Route::get('/ruangan', [RuangaKwnController::class, 'index'])->name('ruangan.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
