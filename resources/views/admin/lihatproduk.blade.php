@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Produk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Tabel Produk</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Penjual</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lihat as $index => $produk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ Str::limit($produk->deskripsi, 50) }}</td>
                            <td>Rp {{ number_format($produk->Harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->penjual->nama ?? '-' }}</td>
                            <td>
                                @if($produk->Gambar)
                                <img src="{{ asset('storage/' . $produk->Gambar) }}" alt="Gambar Produk" width="60">
                                @else
                                <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.produk.hapus', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada produk tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection