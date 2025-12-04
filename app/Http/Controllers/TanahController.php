<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanah;
use App\Models\Kategori;

class TanahController extends Controller
{
    public function index()
    {
        return view('tanah.index', [
            'title' => 'Tanah',
            'items' => Tanah::paginate(10), // paginate 10
            'kategori' => Kategori::all(),
        ]);
    }

    public function create()
    {
        return view('tanah.input');
    }

    public function store(Request $request)
    {
        $tanah = $request->all();
        Tanah::create($tanah);
        return redirect()->route('tanah.index')->with('success', 'Tanah berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        return view('tanah.edit', [
            'item' => Tanah::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $tanah = $request->all();  
        $item = Tanah::findOrFail($id);
        $item->update($tanah);
        return redirect()->route('tanah.index')->with('success','Tanah berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $item = Tanah::findOrFail($id);
        $item->delete();
        return redirect()->route('tanah.index')->with('success','Tanah berhasil dihapus!');
    }
}
