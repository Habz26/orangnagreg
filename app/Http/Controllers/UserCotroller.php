<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'title' => 'User',
            'items' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->all();
        User::create($user);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //skip lagi
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    public function edit($id)
    {
        $item = User::findOrFail($id);

        // Ambil data untuk dropdown dari tabel referensi
        $roles1 = DB::table('referensi')->where('jenis', 1)->where('id', 1)->where('status', 1)->get(); // bisa juga ->pluck('deskripsi', 'id') kalau mau key=id
        $roles0 = DB::table('referensi')->where('jenis', 1)->where('id', 0)->where('status', 1)->get(); // bisa juga ->pluck('deskripsi', 'id') kalau mau key=id

        return view('user.edit', compact('item', 'roles1', 'roles0'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->all();
        $item = User::findOrFail($id);
        $item->update($user);
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
