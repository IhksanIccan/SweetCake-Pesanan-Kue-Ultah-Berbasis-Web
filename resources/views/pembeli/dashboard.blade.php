@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>

    <div class="row">
        <!-- Kartu Biodata -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Biodata</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Isi / Edit</div>
                    </div>
                    <a href="{{ route('pembeli.biodata') }}" class="btn btn-sm btn-primary">Buka</a>
                </div>
            </div>
        </div>

        <!-- Kartu Produk -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kue</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Kue</div>
                    </div>
                    <a href="{{ route('pembeli.produk') }}" class="btn btn-sm btn-success">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Kartu Keranjang -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Keranjang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Belanjaan</div>
                    </div>
                    <a href="{{ route('keranjang.index') }}" class="btn btn-sm btn-warning text-white">Buka</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
