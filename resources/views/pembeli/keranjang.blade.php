@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Keranjang Belanja</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($items->count())
        {{-- Form checkout hanya di bawah, tidak di-nesting --}}
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Kue</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    @php
                        $subtotal = $item->produk->Harga * $item->jumlah;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->produk->nama_produk }}</td>
                        <td>Rp {{ number_format($item->produk->Harga, 0, ',', '.') }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            {{-- Form Hapus HARUS tidak berada dalam form checkout --}}
                            <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Checkout hanya ada di sini --}}
        <form method="POST" action="{{ route('keranjang.checkout') }}">
            @csrf
            <div class="text-end">
                <button type="submit" class="btn btn-success">Checkout</button>
            </div>
        </form>

    @else
        <div class="alert alert-info">Keranjang kamu kosong.</div>
    @endif
</div>
@endsection
