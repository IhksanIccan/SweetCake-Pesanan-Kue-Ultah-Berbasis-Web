@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Kue</h1>

    <!-- Produk Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Kue</h6>
            <a href="{{ route('tambahproduk') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Tambah Kue
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kue</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>Rp {{ number_format($produk->Harga, 2, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                @if($produk->Gambar)
                                <img src="{{ asset('storage/' . $produk->Gambar) }}" alt="gambar" width="60">
                                @else
                                <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('penjual.editproduk', $produk->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('delete', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada kue.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection