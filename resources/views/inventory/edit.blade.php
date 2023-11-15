@extends('layouts/tamplate')
@section('title', 'Edit Inventory IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Inventory</h1>
        <p class="mb-4">Data Inventory IMP Bali.</p>

        <div class="container-fluid px-4">
            <form method="post" enctype="multipart/form-data" action="{{ route('inventory.update', $inventory) }}">
                @csrf
                @method('put')
                <div class="row gx-4">
                    <div class="col-lg-8">

                        <div class="card mb-4">
                            <div class="card-header">Nama Barang</div>
                            <div class="card-body">
                                <input name="nama" type="text" class="form-control" value="{{ $inventory->nama }}" />
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Jumlah</div>
                                <div class="card-body">
                                    <input name="jumlah" type="text" class="form-control"
                                        value="{{ $inventory->jumlah }}" />
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="card-header">Satuan</div>
                            <div class="card-body">
                                <select name="satuan" class="form-control">
                                    <option value="{{ $inventory->satuan }}" disabled selected hidden>
                                        {{ $inventory->satuan }}
                                    </option>
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

        {{-- <!-- Form -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Inventory</h6>
                    </div>
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data"
                            action="{{ route('inventory.update', $inventory) }}">
                            @csrf
                            @method('put')
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td>
                                        <input name="nama" type="text" class="form-control"
                                            value="{{ $inventory->nama }}" />
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td><input name="jumlah" type="text" class="form-control"
                                            value="{{ $inventory->jumlah }}" />
                                        @error('jumlah')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td>
                                        <select name="satuan" class="form-control">
                                            <option value="{{ $inventory->id }}">{{ $inventory->satuan }}</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Cabinet">Cabinet</option>
                                            <option value="Box">Box</option>
                                        </select>
                                        @error('satuan')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                class="fas fa-save"></i>Simpan</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- End Page Content -->
@endsection
