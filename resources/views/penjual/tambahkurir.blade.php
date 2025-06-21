@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Kurir</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjual.kurir.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kurir" class="form-label">Nama Kurir</label>
            <input type="text" name="nama_kurir" id="nama_kurir" class="form-control" required value="{{ old('nama_kurir') }}">
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" required value="{{ old('no_telepon') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penjual.kurir.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
