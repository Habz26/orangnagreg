<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index', [
        'title' => 'Barang',
        'items' => Barang::all(),
    ]);
        
    }
    public function create()
    {
        return view('input');
    }
    function store(Request $request)
    {
        // dd($request->all());
        $barang = $request->all();
        Barang::create($barang);
        // $barang = new Barang();
        // $barang->nama_barang = $request->input('nama_barang');
        // $barang->kode_inventaris = $request->input('kode_inventaris');
        // $barang->kategori_id = $request->input('kategori_id');
        // $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }
}
