<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use App\Models\kurirs;
use App\Models\pesanan;
use App\Models\pesanans;
use App\Models\produk;
use App\Models\produks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{
    // ================== PRODUK ==================

    public function lihatproduk()
    {
        $penjualId = Auth::user()->penjual->id;
        $produks = produk::where('id_penjual', $penjualId)->get();
        return view('penjual.lihatproduk', compact('produks'));
    }

    public function tambahproduk()
    {
        return view('penjual.tambahproduk');
    }

    public function simpanproduk(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'Harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'Gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('Gambar')) {
            $validated['Gambar'] = $request->file('Gambar')->store('gambar_produk', 'public');
        }

        $validated['id_penjual'] = Auth::user()->penjual->id;

        produk::create($validated);

        return redirect()->route('lihatprodukku')->with('success', 'produks berhasil ditambahkan!');
    }

    public function editproduk($id)
    {
        $produk = produk::findOrFail($id);

        if ($produk->id_penjual !== Auth::user()->penjual->id) {
            abort(403, 'Tidak berhak mengedit produk ini.');
        }

        return view('penjual.editproduk', compact('produk'));
    }

    public function updateproduk(Request $request, $id)
    {
        $produk = produk::findOrFail($id);

        if ($produk->id_penjual !== Auth::user()->penjual->id) {
            abort(403);
        }

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'Harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'Gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('Gambar')) {
            $validated['Gambar'] = $request->file('Gambar')->store('gambar_produk', 'public');
        }

        $produk->update($validated);

        return redirect()->route('lihatprodukku')->with('success', 'produks berhasil diperbarui!');
    }

    public function hapusproduk(Request $request)
    {
        $produk = produk::findOrFail($request->id);

        if ($produk->id_penjual !== Auth::user()->penjual->id) {
            abort(403);
        }

        $produk->delete();
        return redirect()->route('lihatprodukku')->with('success', 'produks berhasil dihapus!');
    }

    // ================== PESANAN ==================

    public function lihatpesananpenjual(Request $request)
    {
        $penjualId = Auth::user()->penjual->id;

        $query = pesanan::whereHas('itemPesanans.produk', function ($q) use ($penjualId) {
            $q->where('id_penjual', $penjualId);
        })->with(['pembeli.user', 'itemPesanans.produk']);

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $pesanan = $query->latest()->get();

        return view('penjual.lihatpesanan', compact('pesanan'));
    }

    public function ubahStatusPesanan(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,konfirmasi,on delivery,completed,cancelled'
        ]);

        $pesanan = pesanan::with('itemPesanans.produk')->findOrFail($id);

        if (!$pesanan->itemPesanans->contains(function ($item) {
            return $item->produk->id_penjual === Auth::user()->penjual->id;
        })) {
            abort(403);
        }

        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('penjual.pesanan')->with('success', 'Status pesanan berhasil diubah.');
    }

    public function konfirmasiPembayaran($id)
    {
        $pesanan = pesanan::with('itemPesanans.produk')->findOrFail($id);

        if (!$pesanan->itemPesanans->contains(function ($item) {
            return $item->produk->id_penjual === Auth::user()->penjual->id;
        })) {
            abort(403);
        }

        $pesanan->is_paid = true;
        $pesanan->save();

        return redirect()->route('penjual.pesanan')->with('success', 'Pembayaran telah dikonfirmasi.');
    }

    // ================== KURIR ==================

    public function lihatkurir()
    {
        $penjual = Auth::user()->penjual;
        $kurirs = kurir::where('id_penjual', $penjual->id)->get();

        return view('penjual.kurir', compact('kurirs'));
    }

    public function create()
    {
        return view('penjual.tambahkurir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        kurir::create([
            'id_penjual' => Auth::user()->penjual->id,
            'nama_kurir' => $request->nama_kurir,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('penjual.kurir.index')->with('success', 'kurirs berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kurir = kurir::where('id', $id)
            ->where('id_penjual', Auth::user()->penjual->id)
            ->firstOrFail();

        return view('penjual.editkurir', compact('kurir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        $kurir = kurir::where('id', $id)
            ->where('id_penjual', Auth::user()->penjual->id)
            ->firstOrFail();

        $kurir->update([
            'nama_kurir' => $request->nama_kurir,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('penjual.kurir.index')->with('success', 'kurirs berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kurir = kurir::where('id', $id)
            ->where('id_penjual', Auth::user()->penjual->id)
            ->firstOrFail();

        $kurir->delete();
        return redirect()->route('penjual.kurir.index')->with('success', 'kurirs berhasil dihapus.');
    }
}

