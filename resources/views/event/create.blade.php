@extends('layouts/tamplate')
@section('title', 'Tambah Event IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Event</h1>
        <p class="mb-4">Data Event IMP Bali.</p>

        <!-- Form -->
        <div class="row">

            <!-- Form Event -->
            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Event</h6>
                    </div>
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data" action="{{ route('event.store') }}">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Tanggal Loading</th>
                                    <td>
                                        <input name="tanggal_loading" type="date" class="form-control"
                                            value="{{ old('tanggal_loading') }}" />
                                        @error('tanggal_loading')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Awal Acara</th>
                                    <td><input name="tanggal_awal" type="date" class="form-control"
                                            value="{{ old('tanggal_acara') }}" />
                                        @error('tanggal_acara')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Akhir Acara</th>
                                    <td><input name="tanggal_akhir" type="date" class="form-control"
                                            value="{{ old('tanggal_akhir') }}" />
                                        @error('tanggal_akhir')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ukuran LED</th>
                                    <td><input name="ukuran_led" type="text" class="form-control"
                                            value="{{ old('ukuran_led') }}" />
                                        @error('ukuran_led')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tambahan</th>
                                    <td><input name="alat_tambahan" type="text" class="form-control"
                                            value="{{ old('alat_tambahan') }}" />
                                        @error('alat_tambahan')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td><input name="venue" type="text" class="form-control"
                                            value="{{ old('venue') }}" />
                                        @error('venue')
                                            {{ $message }}
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Note</th>
                                    <td><input name="note" type="text" class="form-control"
                                            value="{{ old('note') }}" />
                                        @error('note')
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

            <!-- Form Karyawan -->
            <div class="col-6">
                <button type="button" class="btn btn-primary btn-sm" id="tambahKaryawanBtn"><i class="fas fa-plus"></i>Tambah Karyawan</button>
                <div id="formKaryawan" class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Karyawan Event</h6>
                    </div>
                    <div class="table-responsive">
                        <form method="post" enctype="multipart/form-data" action="{{ route('event.store') }}">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Crew</th>
                                    <td>
                                        <select name="karyawan" class="form-control">
                                            <option value="" disabled selected hidden>Pilih Crew</option>
                                            @foreach($karyawans as $karyawan)
                                            <option value="{{$karyawan->id}}">{{$karyawan->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Crew</th>
                                    <td>
                                        <select name="status_crew" class="form-control">
                                            <option value="" disabled selected hidden>Pilih Status Crew</option>
                                            <option value="Crew">Crew</option>
                                            <option value="Operator">Operator</option>
                                            <option value="Crew + OP">Crew + OP</option>
                                        </select>
                                        @error('status_crew')
                                        {{ $message }}
                                    @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><input name="keterangan" type="text" class="form-control"
                                            value="{{ old('keterangan') }}" />
                                        @error('keterangan')
                                            {{ $message }}
                                        @enderror
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(document).ready(function() {
            // Counter untuk memberi ID unik pada form karyawan
            let karyawanCounter = 1;
    
            // Event click pada tombol "Tambah Karyawan"
            $("#tambahKaryawanBtn").click(function() {
                // Clone form karyawan
                let clonedForm = $("#formKaryawan").clone();
    
                // Ganti ID dan nama elemen input di form karyawan
                clonedForm.find("select[name='karyawan']").attr("id", "karyawan_" + karyawanCounter);
                clonedForm.find("select[name='status_crew']").attr("id", "status_crew_" + karyawanCounter);
                clonedForm.find("input[name='keterangan']").attr("id", "keterangan_" + karyawanCounter);
    
                // Ganti label dan placeholder
                clonedForm.find("label").each(function() {
                    let labelFor = $(this).attr("for");
                    $(this).attr("for", labelFor + "_" + karyawanCounter);
                });
    
                // Increment counter
                karyawanCounter++;
    
                // Tambahkan form karyawan yang telah di-clone ke halaman
                $(".col-6").append(clonedForm);
            });
        });
    </script>
@endsection
