<?php
use App\Models\Barang;
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