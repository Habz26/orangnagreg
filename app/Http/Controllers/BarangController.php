<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ruangan;

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
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();
        return view('barang.input', compact('kategori', 'ruangan'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $barang = $request->all();
        Barang::create($barang);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }
    public function edit(string $id)
    {
        return view('barang.edit', [
            'item' => Barang::findOrFail($id)
        ]);
    }
    public function update(Request $request, string $id)
    {
        $barang = $request->all();
        $item = Barang::findOrFail($id);
        $item->update($barang);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }
    public function destroy(string $id)
    {
        $item = Barang::findOrFail($id);
        $item->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
