@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = true;
@endphp
@section('header-icon', 'archive')
@section('header-title', 'Add Inventory Log')
@section('back-link', route('inventory-log.index'))
@section('back-desc', 'Back to Inventory Log List')



@section('content')
    <div class="container-fluid px-4">
        <!-- Include Alert Component -->
        @if (session('danger'))
            @component('components.alert')
                @slot('alertType', 'danger')
                @slot('alertMessage')
                    {{ session('danger') }}
                @endslot
            @endcomponent
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('inventory-log.store') }}">
            @csrf
            <div class="row gx-4">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Log Inventory</div>
                        <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Nama barang-->
                                <div class="mb-3">
                                    <label class="small mb-1">Nama Barang</label>
                                    <select class="form-select @error('barang_id') is-invalid @enderror" id="barang"
                                        name="barang_id">
                                        <option selected disabled hidden>Pilih Barang...</option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <label class="small mb-1 text-danger" for="inputSatuan">{{ $message }}</label>
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
                                <!-- Form Status-->
                                <div class="mb-3">
                                    <label class="small mb-1">Status Barang</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option selected disabled hidden>Pilih Status...</option>
                                        <option value="Barang Masuk">Barang Masuk</option>
                                        <option value="Barang Keluar">Barang Keluar</option>

                                    </select>
                                    @error('status')
                                        <label class="small mb-1 text-danger" for="inputSatuan">{{ $message }}</label>
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
