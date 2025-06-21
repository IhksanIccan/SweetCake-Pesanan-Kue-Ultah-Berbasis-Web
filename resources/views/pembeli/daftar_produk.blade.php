@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kue</h3>
    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($produk->Gambar)
                        <img src="{{ asset('storage/' . $produk->Gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ Str::limit($produk->deskripsi, 100) }}</p>
                        <p><strong>Rp {{ number_format($produk->Harga, 0, ',', '.') }}</strong></p>
                        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">+ Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
