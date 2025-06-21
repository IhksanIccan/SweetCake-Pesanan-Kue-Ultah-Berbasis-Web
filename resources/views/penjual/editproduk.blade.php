@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Kue</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">Form Edit Kue</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('penjual.updateproduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Produk -->
                        <div class="form-group mb-3">
                            <label for="nama_produk">Nama Kue</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        </div>

                        <!-- Harga -->
                        <div class="form-group mb-3">
                            <label for="Harga">Harga (Rp)</label>
                            <input type="number" name="Harga" id="Harga" step="0.01" class="form-control" value="{{ old('Harga', $produk->Harga) }}" required>
                        </div>

                        <!-- Gambar -->
                        <div class="form-group mb-3">
                            <label for="Gambar">Gambar Kue</label>
                            @if($produk->Gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $produk->Gambar) }}" width="100" alt="Gambar Produk">
                                </div>
                            @endif
                            <input type="file" name="Gambar" id="Gambar" class="form-control-file" accept="image/*">
                        </div>

                        <!-- Stok -->
                        <div class="form-group mb-3">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" min="0" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group text-end">
                            <a href="{{ route('lihatprodukku') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Update Kue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
