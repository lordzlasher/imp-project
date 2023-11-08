@extends('layouts/tamplate')
@section('title', 'Tambah Inventory IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Inventory</h1>
        <p class="mb-4">Data Inventory IMP Bali.</p>

        <!-- Form -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Inventory</h6>
                    </div>
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data" action="{{ route('inventory.store') }}">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama Barang</th>
                                    <td>
                                        <input name="nama" type="text" class="form-control"
                                            value="{{ old('nama') }}" />
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td><input name="jumlah" type="text" class="form-control"
                                            value="{{ old('jumlah') }}" />
                                        @error('jumlah')
                                            {{ $message }}
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td>
                                        <select name="satuan" class="form-control">
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
        </div>
    </div>
    <!-- End Page Content -->
@endsection
