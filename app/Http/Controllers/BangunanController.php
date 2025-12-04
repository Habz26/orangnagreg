<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bangunan;
use App\Models\Tanah;

class BangunanController extends Controller
{
    public function index()
    {
        return view('bangunan.index', [
            'title' => 'Bangunan',
            'items' => Bangunan::with('tanah')->paginate(10), // paginate 10
            'tanah' => Tanah::all(),
        ]);
    }

    public function create()
    {
        return view('bangunan.input', [
            'tanah' => Tanah::all()
        ]);
    }

    public function store(Request $request)
    {
        Bangunan::create($request->all());
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        return view('bangunan.edit', [
            'item' => Bangunan::findOrFail($id),
            'tanah' => Tanah::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $item = Bangunan::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $item = Bangunan::findOrFail($id);
        $item->delete();
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil dihapus!');
    }
}
