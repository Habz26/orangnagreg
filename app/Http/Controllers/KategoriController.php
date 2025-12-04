<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index', [
            'title' => 'Kategori',
            'items' => Kategori::paginate(10), // pagination 10
        ]);
    }

    public function create()
    {
        return view('kategori.input');
    }

    public function store(Request $request)
    {
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        return view('kategori.edit', [
            'item' => Kategori::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $item = Kategori::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $item = Kategori::findOrFail($id);
        $item->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
