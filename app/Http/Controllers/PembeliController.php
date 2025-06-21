<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\produk;
use App\Models\pembeli;
use App\Models\produks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function formBiodata()
    {
        $pembeli = Auth::user()->pembeli;
        return view('pembeli.biodata', compact('pembeli'));
    }

    public function updateBiodata(Request $request)
    {
        $request->validate([
            'No_HP' => 'required|string|max:20',
            'Alamat_Pembeli' => 'required|string',
        ]);

        $pembeli = Auth::user()->pembeli;

        $pembeli->update([
            'No_HP' => $request->No_HP,
            'Alamat_Pembeli' => $request->Alamat_Pembeli,
        ]);

        return redirect()->back()->with('success', 'Biodata berhasil diperbarui.');
    }

    public function daftarProduk()
{
    $produks = produk::with('penjual.user')->latest()->paginate(12);
    return view('pembeli.daftar_produk', compact('produks'));
}

public function detailProduk($id)
{
    $produk = produk::with('penjual.user')->findOrFail($id);
    return view('pembeli.detail_produk', compact('produk'));
}
}
