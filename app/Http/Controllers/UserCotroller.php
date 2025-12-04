<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserCotroller extends Controller
{
    public function index()
    {
        return view('user.index', [
            'title' => 'User',
            'items' => User::paginate(10), // paginate 10
        ]);
    }

    public function create()
    {
        return view('user.input');
    }

    public function store(Request $request)
    {
        $user = $request->all();
        User::create($user);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        $roles1 = DB::table('referensi')->where('jenis', 1)->where('id', 1)->where('status', 1)->get();
        $roles0 = DB::table('referensi')->where('jenis', 1)->where('id', 0)->where('status', 1)->get();

        return view('user.edit', compact('item', 'roles1', 'roles0'));
    }

    public function update(Request $request, string $id)
    {
        $user = $request->all();
        $item = User::findOrFail($id);
        $item->update($user);
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
