<?php
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Bangunan;
use App\Models\Tanah;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('index', ['name' => 'Dede Sahrur Mubarok']);
});

Route::get('/barang', function () {
    return view('barang', [
        'title' => 'Barang',
        'items' => Barang::all(),
    ]);
});

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