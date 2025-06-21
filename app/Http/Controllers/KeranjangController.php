<?php

namespace App\Http\Controllers;

use App\Models\item_pesanans;
use App\Models\produk;
use App\Models\pesanan;
use App\Models\keranjangs;
use App\Models\ItemPesanan;
use App\Models\Keranjang;
use App\Models\pesanans;
use App\Models\produks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // Menampilkan isi keranjang pembeli
    public function index()
    {
        $pembeli = Auth::user()->pembeli;

        if (!$pembeli) {
            abort(403, 'Hanya pembeli yang dapat mengakses keranjang.');
        }

        $items = Keranjang::with('produk')
            ->where('pembeli_id', $pembeli->id)
            ->get();

        return view('pembeli.keranjang', compact('items'));
    }

    // Menambahkan produk ke keranjang
    public function tambah(Request $request, $produkId)
    {
        $pembeli = Auth::user()->pembeli;

        if (!$pembeli) {
            abort(403, 'Hanya pembeli yang dapat menambahkan ke keranjang.');
        }

        $produk = produk::findOrFail($produkId);

        $item = keranjang::where('pembeli_id', $pembeli->id)
            ->where('produk_id', $produkId)
            ->first();

        if ($item) {
            $item->jumlah += 1;
            $item->save();
        } else {
            keranjang::create([
                'pembeli_id' => $pembeli->id,
                'produk_id' => $produk->id,
                'jumlah' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'produks berhasil ditambahkan ke keranjang.');
    }

    // Menghapus item dari keranjang
    public function hapus($id)
    {
        $item = keranjang::findOrFail($id);
        $pembeli = Auth::user()->pembeli;

        if ($item->pembeli_id !== $pembeli->id) {
            abort(403, 'Akses ditolak.');
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // Checkout dan buat pesanan
    public function checkout(Request $request)
    {
        $pembeli = Auth::user()->pembeli;

        if (!$pembeli) {
            abort(403, 'Hanya pembeli yang dapat melakukan checkout.');
        }

        $items = keranjang::with('produk')->where('pembeli_id', $pembeli->id)->get();

        if ($items->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'keranjangs kosong. Tidak dapat melakukan checkout.');
        }

        // Hitung total harga
        $totalHarga = $items->sum(function ($item) {
            return $item->produk->Harga * $item->jumlah;
        });

        // Simpan ke tabel `pesanans`
        $pesanan = pesanan::create([
            'id_pembeli' => $pembeli->id,
            'Total_Harga' => $totalHarga,
            'status' => 'pending',
            'is_paid' => false,
        ]);

        // Simpan ke tabel `item_pesanans`
        foreach ($items as $item) {
            ItemPesanan::create([
                'id_pesanan' => $pesanan->id,
                'id_produk' => $item->produk->id,
                'jumlah' => $item->jumlah,
                'harga_satuan' => $item->produk->Harga,
            ]);
        }

        // Hapus isi keranjang
        keranjang::where('pembeli_id', $pembeli->id)->delete();

        return redirect()->route('keranjang.index')->with('success', 'Checkout berhasil! Pesanan Anda telah diproses.');
    }
}
