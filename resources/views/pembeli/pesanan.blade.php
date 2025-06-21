@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Pesanan Saya</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($pesanan->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Detail Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $index => $psn)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>Rp {{ number_format($psn->Total_Harga, 0, ',', '.') }}</td>
                        <td><span class="badge bg-info">{{ ucfirst($psn->status) }}</span></td>
                        <td>
                            @if($psn->is_paid)
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Lunas</span>
                            @endif
                        </td>
                        <td>{{ $psn->created_at->format('d M Y') }}</td>
                        <td>
                            <ul>
                                @foreach($psn->itemPesanans as $item)
                                    <li>{{ $item->produk->nama_produk }} x{{ $item->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info">Belum ada pesanan.</div>
    @endif
</div>
@endsection
