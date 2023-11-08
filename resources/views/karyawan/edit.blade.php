@extends('layouts/tamplate')
@section('title', 'Edit Karyawan IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
        <p class="mb-4">Data Karyawan IMP Bali.</p>

        <!-- Form -->
        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Karyawan</h6>
                    </div>
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data" action="{{ route('karyawan.update', $karyawan) }}">
                            @csrf
                            @method('put')
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td>
                                        <input name="nama" type="text" class="form-control"
                                            value="{{$karyawan->nama}}" />
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><input name="alamat" type="text" class="form-control"
                                        value="{{$karyawan->alamat}}" />
                                        @error('alamat')
                                            {{ $message }}
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                <tr>
                                    <th>Nomer Hp</th>
                                    <td><input name="nomer_hp" type="text" class="form-control"
                                        value="{{$karyawan->nomer_hp}}" />
                                        @error('nomer_hp')
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
