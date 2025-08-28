<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Bangunan;
use App\Models\Barang;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ruangan.index', [
            'title' => 'Ruangan',
            'items' => Ruangan::with('bangunan')->get(),
            'bangunan' => Bangunan::all(),
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bangunan = Bangunan::all();
        return view('ruangan.input', ['bangunan' => $bangunan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ruangan = $request->all();
        Ruangan::create($ruangan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('ruangan.edit', [
            'item' => Ruangan::findOrFail($id),
            'bangunan' => Bangunan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ruangan = $request->all();
        $item = Ruangan::findOrFail($id);
        $item->update($ruangan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Ruangan::findOrFail($id);
        $item->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}
