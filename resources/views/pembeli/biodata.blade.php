@extends('layoutDashboard.master')

@section('content')
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lengkapi Biodata</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Biodata</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pembeli.biodata.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Alamat_Pembeli">Alamat</label>
                            <input type="text" name="Alamat_Pembeli" id="Alamat_Pembeli" class="form-control"
                                value="{{ old('Alamat_Pembeli', $pembeli->Alamat_Pembeli ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="No_HP">Nomor Telepon</label>
                            <input type="text" name="No_HP" id="No_HP" class="form-control"
                                value="{{ old('No_HP', $pembeli->No_HP ?? '') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
