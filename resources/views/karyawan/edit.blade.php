@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = true;
@endphp
@section('header-icon', 'user-check')
@section('header-title', 'Update Karyawan')
@section('back-link', route('karyawan.index'))
@section('back-desc', 'Back to Karyawan List')


@section('content')
    <div class="container-fluid px-4">
        <form method="post" enctype="multipart/form-data" action="{{ route('karyawan.update', $karyawan) }}">
            @csrf
            @method('put')

            <div class="row gx-4">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Karyawan Details</div>
                        <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Name -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNama">Nama</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" type="text" placeholder="Masukan nama"
                                        value="{{ $karyawan->nama }}" />
                                    @error('nama')
                                        <label class="small mb-1 text-danger" for="inputNama">{{ $message }}</label>
                                    @enderror

                                </div>
                                <!-- Form Alamat -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        name="alamat" type="text" placeholder="Masukan alamat tempat tinggal"
                                        value="{{ $karyawan->alamat }}" />
                                    @error('alamat')
                                        <label class="small mb-1 text-danger" for="inputNama">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Nomer HP -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNomerHP">Nomer HP</label>
                                    <input class="form-control @error('nomer_hp') is-invalid @enderror" id="nomer_hp"
                                        name="nomer_hp" type="text" placeholder="Masukan nomer yang bisa dihubungi"
                                        value="{{ $karyawan->nomer_hp }}" />
                                    @error('nomer_hp')
                                        <label class="small mb-1 text-danger" for="inputNama">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Jenis Bank -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputBank">Jenis Bank</label>
                                    <input class="form-control @error('jenis_bank') is-invalid @enderror" id="jenis_bank"
                                        name="jenis_bank" type="text" value="{{ $karyawan->jenis_bank }}" />
                                    @error('jenis_bank')
                                        <label class="small mb-1 text-danger" for="inputBank">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Nomer Rekening -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNomerRekening">Nomer Rekening</label>
                                    <input class="form-control @error('nomer_rekening') is-invalid @enderror"
                                        id="nomer_rekening" name="nomer_rekening" type="text"
                                        value="{{ $karyawan->nomer_rekening }}" />
                                    @error('nomer_rekening')
                                        <label class="small mb-1 text-danger"
                                            for="inputNomerRekening">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <!-- Form KTP card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Foto KTP</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img id="ktp_preview" class="img-account-profile mb-3" width="250"
                                src="{{ asset('storage/' . $karyawan->ktp) }}" />
                            <!-- Profile picture upload button-->
                            <input class="form-control  @error('ktp') is-invalid @enderror" id="ktp" name="ktp"
                                type="file" onchange="previewImage(event)" value="{{ $karyawan->ktp }}">
                            @error('ktp')
                                <label class="small mb-1 text-danger" for="inputNomerRekening">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="card mb-4 mb-xl-0 mt-3">
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

            </div>
        </form>
    </div>

    <script>
        var previewImage = function(event) {
            var output = document.getElementById('ktp_preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
