@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = true;
@endphp
@section('header-icon', 'package')
@section('header-title', 'Add Inventory')
@section('back-link', route('inventory.index'))
@section('back-desc', 'Back to Inventory List')


@section('content')
    <div class="container-fluid px-4">
        <form method="post" enctype="multipart/form-data" action="{{ route('inventory.store') }}">
            @csrf
            <div class="row gx-4">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detail Barang</div>
                        <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Name -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNama">Nama Barang</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" type="text" placeholder="Masukan nama barang..."
                                        value="{{ old('nama') }}" />
                                    @error('nama')
                                        <label class="small mb-1 text-danger" for="inputNama">{{ $message }}</label>
                                    @enderror

                                </div>
                                <!-- Form jumlah -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputJumlah">Jumlah Barang</label>
                                    <input class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                        name="jumlah" type="number" placeholder="Masukan jumlah barang..."
                                        value="{{ old('jumlah') }}" />
                                    @error('jumlah')
                                        <label class="small mb-1 text-danger" for="inputJumlah">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Satuan barang-->
                                <div class="mb-3">
                                    <label class="small mb-1">Satuan Barang</label>
                                    <input class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                                        name="satuan" type="text" placeholder="Masukan satuan barang..."
                                        value="{{ old('satuan') }}" />
                                    @error('satuan')
                                        <label class="small mb-1 text-danger" for="inputNama">{{ $message }}</label>
                                    @enderror
                                </div>
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
@endsection
