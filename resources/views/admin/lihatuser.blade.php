@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Pengguna</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Tabel Pengguna</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lihat as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <span class="badge 
                                        @if($user->role == 'admin') bg-primary
                                        @elseif($user->role == 'penjual') bg-warning text-dark
                                        @elseif($user->role == 'pembeli') bg-success
                                        @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('hapus', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada pengguna ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection