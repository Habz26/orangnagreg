<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\Tanah;
use App\Models\Bangunan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // Total data untuk small-box
        $totalInventaris = Barang::sum('jumlah');
        $totalRuangan = Ruangan::count();
        $totalBangunan = Bangunan::count();
        $totalTanah = Tanah::count();
        $totalUser = User::count();

        // Data Terkini (selalu tampil, tidak tergantung search)
        $barangs = Barang::latest()->take(10)->get();
        $ruangan = Ruangan::latest()->take(10)->get();
        $bangunan = Bangunan::latest()->take(10)->get();
        $tanah = Tanah::latest()->take(10)->get();
        $tanahList = Tanah::with(['bangunan.ruangan.barangs'])->get();

        // Hasil pencarian (hanya jika ada query)
        $searchBarangs = collect();
        $searchRuangan = collect();
        $searchBangunan = collect();
        $searchTanah = collect();

        if ($q) {
            $searchBarangs = Barang::where('nama_barang', 'like', "%$q%")->get();
            $searchRuangan = Ruangan::where('nama_ruangan', 'like', "%$q%")
                ->orWhere('kode_ruangan', 'like', "%$q%")
                ->get();
            $searchBangunan = Bangunan::where('nama_bangunan', 'like', "%$q%")
                ->orWhere('kode_bangunan', 'like', "%$q%")
                ->get();
            $searchTanah = Tanah::where('nama_tanah', 'like', "%$q%")
                ->orWhere('luas', 'like', "%$q%")
                ->get();
        }

        return view('dashboard', compact('barangs', 'ruangan', 'bangunan', 'tanah', 'searchBarangs', 'searchRuangan', 'searchBangunan', 'searchTanah', 'totalInventaris', 'totalRuangan', 'totalBangunan', 'totalTanah', 'totalUser', 'q', 'tanahList'));
    }
}
