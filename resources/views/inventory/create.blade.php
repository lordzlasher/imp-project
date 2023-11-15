@extends('layouts/tamplate')
@section('title', 'Tambah Inventory IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Inventory</h1>
        <p class="mb-4">Data Inventory IMP Bali.</p>

        <div class="container-fluid px-4">
            <form method="post" enctype="multipart/form-data" action="{{ route('inventory.store') }}">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-8">

                        <div class="card mb-4">
                            <div class="card-header">Nama Barang</div>
                            <div class="card-body">
                                <input name="nama" type="text" class="form-control" value="{{ old('nama') }}" />
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Jumlah</div>
                                <div class="card-body">
                                    <input name="jumlah" type="text" class="form-control" value="{{ old('jumlah') }}" />
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="card-header">Satuan</div>
                            <div class="card-body">
                                <select name="satuan" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Satuan Barang</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit['nama'] }}">{{ $unit['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-header-actions">
                            <div class="card-header">
                                Simpan
                            </div>
                            <div class="card-body">
                                <div class="d-grid"><button class="fw-500 btn btn-primary">Simpan</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page Content -->
@endsection
