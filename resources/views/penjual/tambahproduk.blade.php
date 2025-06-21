@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Tambah Kue Baru</h1>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Form Kue</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpanproduk') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Produk -->
                        <div class="form-group">
                            <label for="nama_produk">Nama Kue</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukkan nama kue" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Tulis deskripsi kue..."></textarea>
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="Harga">Harga (Rp)</label>
                            <input type="number" name="Harga" id="Harga" step="0.01" class="form-control" placeholder="Contoh: 15000" required>
                        </div>

                        <!-- Gambar -->
                        <div class="form-group">
                            <label for="Gambar">Gambar Kue</label>
                            <input type="file" name="Gambar" id="Gambar" class="form-control-file" accept="image/*">
                        </div>

                        <!-- Stok -->
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" min="0" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan Kue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
