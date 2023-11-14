@extends('layouts/tamplate')
@section('title', 'Tambah Event IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Event</h1>
        <p class="mb-4">Data Event IMP Bali.</p>

        <!-- Main page content-->
        <div class="container-fluid px-4">
            <div class="row gx-4">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">Tanggal Loading</div>
                        <div class="card-body">
                            <input name="tanggal_loading" type="date" class="form-control"
                                value="{{ old('tanggal_loading') }}" />
                            @error('tanggal_loading')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="card-header">Tanggal Mulai Event</div>
                        <div class="card-body">
                            <input name="tanggal_awal" type="date" class="form-control"
                                value="{{ old('tanggal_acara') }}" />
                            @error('tanggal_acara')
                                            {{ $message }}
                                        @enderror
                        </div>

                        <div class="card-header">Tanggal Selesai Event</div>
                        <div class="card-body">
                            <input name="tanggal_akhir" type="date" class="form-control"
                                value="{{ old('tanggal_akhir') }}" />
                            @error('tanggal_akhir')
                            {{ $message }}
                        @enderror
                        </div>

                        <div class="card-header">Ukuran LED</div>
                        <div class="card-body">
                            <input name="ukuran_led" type="text" class="form-control" value="{{ old('ukuran_led') }}" />
                            @error('ukuran_led')
                                            {{ $message }}
                                        @enderror
                        </div>

                        <div class="card-header">Barang Tambahan</div>
                        <div class="card-body">
                            <input name="alat_tambahan" type="text" class="form-control"
                                value="{{ old('alat_tambahan') }}" />
                            @error('alat_tambahan')
                                            {{ $message }}
                                        @enderror
                        </div>

                        <div class="card-header">Venue</div>
                        <div class="card-body">
                            <input name="venue" type="text" class="form-control" value="{{ old('venue') }}" />
                            @error('venue')
                                            {{ $message }}
                                        @enderror
                        </div>

                        <div class="card-header">Note</div>
                        <div class="card-body">
                            <input name="note" type="text" class="form-control" value="{{ old('note') }}" />
                            @error('note')
                                            {{ $message }}
                                        @enderror
                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-header">Crew</div>
                        <div class="card-body">
                            <select name="karyawan" class="form-control">
                                <option value="" disabled selected hidden>Pilih Crew</option>
                                @foreach($karyawans as $karyawan)
                                <option value="{{$karyawan->id}}">{{$karyawan->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Simpan
                            <i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="After submitting, your post will be published once it is approved by a moderator."></i>
                        </div>
                        <div class="card-body">
                            <div class="d-grid"><button class="fw-500 btn btn-primary">Simpan</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
