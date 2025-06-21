@extends('layoutDashboard.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Kurir Saya</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('penjual.kurir.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Kurir
    </a>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kurir</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kurirs as $index => $kurir)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kurir->nama_kurir }}</td>
                            <td>{{ $kurir->no_telepon }}</td>
                            <td>
                                {{-- Edit & Hapus jika kamu mau --}}
                                <form action="{{ route('penjual.kurir.destroy', $kurir->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kurir ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('penjual.kurir.edit', $kurir->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada kurir ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
