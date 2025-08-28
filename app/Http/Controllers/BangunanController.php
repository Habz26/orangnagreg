<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bangunan.index', [
            'title' => 'Bangunan',
            'items' => \App\Models\Bangunan::with('tanah')->get(),
            'tanah' => \App\Models\Tanah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bangunan.input', [
            'tanah' => \App\Models\Tanah::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bangunan = $request->all();
        \App\Models\Bangunan::create($bangunan);
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil ditambahkan!');
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
        return view('bangunan.edit', [
            'item' => \App\Models\Bangunan::findOrFail($id),
            'tanah' => \App\Models\Tanah::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bangunan = $request->all();
        $item = \App\Models\Bangunan::findOrFail($id);
        $item->update($bangunan);
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = \App\Models\Bangunan::findOrFail($id);
        $item->delete();
        return redirect()->route('bangunan.index')->with('success', 'Bangunan berhasil dihapus!');
    }
}
