@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow mb-4">
        <div class="row no-gutters">
            <div class="col-md-5">
                @if($produk->Gambar)
                    <img src="{{ asset('storage/produk/' . $produk->Gambar) }}" class="img-fluid rounded-start" alt="{{ $produk->nama_produk }}">
                @else
                    <img src="{{ asset('images/default-product.png') }}" class="img-fluid rounded-start" alt="Default Image">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title">{{ $produk->nama_produk }}</h3>
                    <h5 class="text-success">Rp {{ number_format($produk->Harga, 0, ',', '.') }}</h5>
                    <p class="card-text mt-3">{{ $produk->deskripsi }}</p>
                    <p class="card-text"><strong>Stok:</strong> {{ $produk->stok }}</p>
                    <p class="card-text"><strong>Penjual:</strong> {{ optional($produk->penjual->user)->name ?? '-' }}</p>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
