<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanah;
use App\Models\Kategori;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tanah.index', [
            'title' => 'Tanah',
            'items' => Tanah::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tanah.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tanah = $request->all();
        \App\Models\Tanah::create($tanah);
        return redirect()->route('tanah.index')->with('success', 'Tanah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //skip malas
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tanah.edit', [
            'item' => Tanah::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tanah = $request->all();  
        $item = Tanah::findOrFail($id);
        $item->update($tanah);
        return redirect()->route('tanah.index')->with('success','Tanah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Tanah::findOrFail($id);
        $item->delete();
        return redirect()->route('tanah.index')->with('success','Tanah berhasil dihapus!');
    }
}
