@extends('layoutDashboard.master') {{-- Ganti jika layout dashboard berbeda --}}

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Pesanan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Tabel Pesanan</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nomor</th>
                            <th>Pembeli</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Kurir</th>
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lihat as $index => $pesanan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pesanan->pembeli->user->name ?? '-' }}</td>
                                <td>Rp {{ number_format($pesanan->Total_Harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge 
                                        @if($pesanan->status == 'pending') badge-secondary
                                        @elseif($pesanan->status == 'konfirmasi') badge-warning
                                        @elseif($pesanan->status == 'on delivery') badge-info
                                        @elseif($pesanan->status == 'completed') badge-success
                                        @elseif($pesanan->status == 'cancelled') badge-danger
                                        @endif">
                                        {{ ucfirst($pesanan->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($pesanan->is_paid)
                                        <span class="badge badge-success">Lunas</span>
                                    @else
                                        <span class="badge badge-danger">Belum Lunas</span>
                                    @endif
                                </td>
                                <td>{{ $pesanan->kurir->name ?? '-' }}</td>
                                <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                                <!-- <td>
                                    <a href="{{ route('admin.pesanan.show', $pesanan->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td> -->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
