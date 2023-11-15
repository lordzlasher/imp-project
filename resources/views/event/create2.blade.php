@extends('layouts/tamplate')
@section('title', 'Tambah Event IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Event</h1>

        <!-- Main page content-->
        <div class="container-fluid px-4">
            <form method="post" enctype="multipart/form-data" action="{{ route('event.store') }}">
                @csrf
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
                                <input name="tanggal_mulai" type="date" class="form-control"
                                    value="{{ old('tanggal_mulai') }}" />
                                @error('tanggal_mulai')
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
                                <input name="ukuran_led" type="text" class="form-control"
                                    value="{{ old('ukuran_led') }}" />
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

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Form Crew</h1>

                        <div class="card mb-5 crew-item ">
                            <div class="card-header">Crew
                                <button class="close" type="button" aria-label="Close">
                                    <span>×</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <select name="karyawan[]" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Crew</option>
                                    @foreach ($karyawans as $karyawan)
                                        <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-header">Status</div>
                            <div class="card-body">
                                <select name="status_crew[]" class="form-control">
                                    <option value="" disabled selected hidden>Pilih Status Crew</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status['nama'] }}">{{ $status['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-header">Keterangan</div>
                            <div class="card-body">
                                <input name="keterangan_crew[]" type="text" class="form-control"
                                    value="{{ old('keterangan_crew[]') }}" />
                                @error('keterangan_crew')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-success btn-add-crew">Tambah Karyawan</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
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
            </form>
        </div>
    </div>

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Counter untuk item kru dinamis
            var crewCounter = 1;

            // Event listener untuk tombol "Tambah Karyawan"
            $(document).on('click', '.btn-add-crew', function() {
                // Clone template item kru
                var newCrewItem = $('.crew-item').first().clone();

                // Update ID dan nama agar unik
                newCrewItem.find('select[name="karyawan[]"]').attr('name', 'karyawan[' + crewCounter + ']');
                newCrewItem.find('select[name="status_crew[]"]').attr('name', 'status_crew[' + crewCounter +
                    ']');
                newCrewItem.find('input[name="keterangan_crew[]"]').attr('name', 'keterangan_crew[' +
                    crewCounter + ']');

                // Hapus tombol "Tambah Karyawan" dari item kru sebelumnya
                $('.btn-add-crew').remove();

                // Tambahkan nomor counter ke belakang class "crew-item"
                newCrewItem.removeClass('crew-item').addClass('crew-item-' + crewCounter);

                // Tambahkan item kru baru ke dalam container
                $('.col-lg-8').append(newCrewItem);

                // Tambahkan tombol "Tambah Karyawan" pada item kru yang baru
                newCrewItem.find('.card-footer').html(
                    '<button type="button" class="btn btn-success btn-add-crew">Tambah Karyawan</button>'
                );

                // Increment counter
                crewCounter++;
            });

            // Menangani penghapusan karyawan dengan event delegation
            $('.col-lg-8').on('click', '.crew-item .close', function() {
                var crewItem = $(this).closest('.crew-item');
                if (crewItem) {
                    var crewId = crewItem.data('crew-id');
                    // Lakukan sesuatu dengan crewId, misalnya menghapus data di server
                    crewItem.remove();
                }
            });
        });
    </script>
@endsection
@endsection
