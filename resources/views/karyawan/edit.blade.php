@extends('layouts/tamplate')
@section('title', 'Edit Karyawan IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    @section('header-title', 'Karyawan Edit')
    @section('header-description', 'Formulir untuk mengupdate Data karyawan.')
    @section('back', 'Back')
    @section('back-link', route('karyawan.index'))

    <div class="container-fluid px-4">
        <form method="post" enctype="multipart/form-data" action="{{ route('karyawan.update', $karyawan) }}">
            @csrf
            @method('put')
            <div class="row gx-4">
                <div class="col-lg-8">

                    <div class="card mb-4">
                        <div class="card-header">Nama</div>
                        <div class="card-body">
                            <input name="nama" type="text" class="form-control" value="{{ $karyawan->nama }}" />
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Alamat</div>
                            <div class="card-body">
                                <input name="alamat" type="text" class="form-control"
                                    value="{{ $karyawan->alamat }}" />
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Nomer HP</div>
                            <div class="card-body">
                                <input name="nomer_hp" type="text" class="form-control"
                                    value="{{ $karyawan->nomer_hp }}" />
                                @error('nomer_hp')
                                    {{ $message }}
                                @enderror
                            </div>
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
