@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Pesanan Kue Saya</h3>

    {{-- Filter status --}}
    <form method="GET" class="mb-3">
        <select name="status" class="form-select w-auto d-inline" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            @foreach(['pending', 'konfirmasi', 'on delivery', 'completed', 'cancelled'] as $status)
                <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </form>

    @forelse ($pesanan as $pesanan)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>#{{ $pesanan->id }}</strong><br>
                    <small>{{ $pesanan->created_at->format('d M Y H:i') }}</small>
                </div>
                <span class="badge {{ 
                    $pesanan->status == 'pending' ? 'bg-secondary' : 
                    ($pesanan->status == 'konfirmasi' ? 'bg-warning' : 
                    ($pesanan->status == 'on delivery' ? 'bg-info' : 
                    ($pesanan->status == 'completed' ? 'bg-success' : 'bg-danger')))
                }}">
                    {{ ucfirst($pesanan->status) }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>Pembeli:</strong> {{ $pesanan->pembeli->user->name ?? '-' }}</p>
                <p>
                    <strong>Pembayaran:</strong>
                    @if($pesanan->is_paid)
                        <span class="badge bg-success">Lunas</span>
                    @else
                        <span class="badge bg-danger">Belum Lunas</span>
                        <form method="POST" action="{{ route('penjual.pesanan.konfirmasi', $pesanan->id) }}" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-outline-success">Konfirmasi</button>
                        </form>
                    @endif
                </p>

                {{-- Tabel detail pesanan --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan->itemPesanans as $item)
                            @if($item->produk->id_penjual == auth()->user()->penjual->id)
                                <tr>
                                    <td>{{ $item->produk->nama_produk }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>Rp {{ number_format($item->jumlah * $item->harga_satuan, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{-- Form ubah status pesanan --}}
                <form method="POST" action="{{ route('penjual.pesanan.ubahstatus', $pesanan->id) }}" class="mt-2">
                    @csrf @method('PATCH')
                    <div class="d-flex align-items-center gap-2">
                        <select name="status" class="form-select w-auto">
                            @foreach(['pending', 'konfirmasi', 'on delivery', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}" {{ $pesanan->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah Status</button>
                    </div>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">Belum ada pesanan.</div>
    @endforelse
</div>
@endsection
