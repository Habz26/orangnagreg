<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Bangunan;
use App\Models\Barang;

class RuanganController extends Controller
{
    public function index()
    {
        return view('ruangan.index', [
            'title' => 'Ruangan',
            'items' => Ruangan::with('bangunan')->paginate(10), // paginate 10
            'bangunan' => Bangunan::all(),
            'barang' => Barang::all(),
        ]);
    }

    public function create()
    {
        $bangunan = Bangunan::all();
        return view('ruangan.input', compact('bangunan'));
    }

    public function store(Request $request)
    {
        $ruangan = $request->all();
        Ruangan::create($ruangan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        return view('ruangan.edit', [
            'item' => Ruangan::findOrFail($id),
            'bangunan' => Bangunan::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $ruangan = $request->all();
        $item = Ruangan::findOrFail($id);
        $item->update($ruangan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $item = Ruangan::findOrFail($id);
        $item->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}
