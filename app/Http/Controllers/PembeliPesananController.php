<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\pesanans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliPesananController extends Controller
{
    public function index()
    {
        $pembeli = Auth::user()->pembeli;

        $pesananList = pesanan::where('id_pembeli', $pembeli->id)
                        ->withCount('itemPesanan')
                        ->latest()
                        ->get();

        return view('pembeli.pesanan.index', compact('pesananList'));
    }

    public function show($id)
    {
        $pesanan = pesanan::with('itemPesanan.produk')->findOrFail($id);

        // Cegah akses ke pesanan orang lain
        if ($pesanan->id_pembeli !== Auth::user()->pembeli->id) {
            abort(403);
        }

        return view('pembeli.pesanan.show', compact('pesanan'));
    }
}
