@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = true;
@endphp
@section('header-icon', 'briefcase')
@section('header-title', 'Add Event')
@section('back-link', route('event.index'))
@section('back-desc', 'Back to Event List')


@section('content')
    <div class="container-fluid px-4">
        <form method="post" enctype="multipart/form-data" action="{{ route('event.store') }}" autocomplete="off">
            @csrf
            <div class="row gx-4">
                <div class="col-xl-8">
                    <!-- Event details card-->
                    <div class="card mb-4">
                        <div class="card-header">Event Details</div>
                        <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Tanggal Loading -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputTglLoading">Tanggal Loading</label>
                                    <input class="form-control @error('tanggal_loading') is-invalid @enderror"
                                        id="litepickerSingleDate" name="tanggal_loading"
                                        placeholder="Masukan Tanggal Loading Barang..." value="{{ old('tanggal_loading') }}"
                                        autocomplete="off" />
                                    @error('tanggal_loading')
                                        <label class="small mb-1 text-danger" for="inputTglLoading">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Tanggal Acara -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputTanggalAcara">Tanggal Acara</label>
                                    <input class="form-control @error('tanggal_acara[]') is-invalid @enderror"
                                        name="tanggal_acara[]" id="litepickerDateRange"
                                        placeholder="Select Tanggal Acara..." value="{{ old('tanggal_acara[]') }}"
                                        autocomplete="off" />
                                    @error('tanggal_acara[]')
                                        <label class="small mb-1 text-danger"
                                            for="inputTanggalAcara">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Ukuran LED -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUkuran">Ukuran LED</label>
                                    <!-- Date Range Picker Example-->
                                    <input class="form-control @error('ukuran_led') is-invalid @enderror" name="ukuran_led"
                                        id="ukuran_led" placeholder="Masukan Ukuran LED..." type="text"
                                        value="{{ old('ukuran_led') }}" />
                                    @error('ukuran_led')
                                        <label class="small mb-1 text-danger" for="inputUkuran">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Venue -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputVenue">Venue</label>
                                    <!-- Date Range Picker Example-->
                                    <input class="form-control @error('venue') is-invalid @enderror" name="venue"
                                        id="venue" type="text" placeholder="Masukan Venue Event..."
                                        value="{{ old('venue') }}" />
                                    @error('venue')
                                        <label class="small mb-1 text-danger" for="inputVenue">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Client -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUkuran">Client</label>
                                    <!-- Date Range Picker Example-->
                                    <input class="form-control @error('client') is-invalid @enderror" name="client"
                                        id="client" placeholder="Masukan Client..." type="text"
                                        value="{{ old('client') }}" />
                                    @error('client')
                                        <label class="small mb-1 text-danger" for="inputUkuran">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Kategori Event -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputCrew">Ketegori Event</label>
                                    <select class="form-select @error('kategori_event') is-invalid @enderror"
                                        name="kategori_event" id="kategori_event">
                                        <option selected hidden>Pilih Ketegori Event...</option>
                                        @foreach ($kategories as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_event }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_event')
                                        <label class="small mb-1 text-danger" for="inputCrew">{{ $message }}</label>
                                    @enderror
                                </div>
                                <!-- Form Note -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNote">Note</label>
                                    <!-- Date Range Picker Example-->
                                    <input class="form-control @error('note') is-invalid @enderror" name="note"
                                        id="note" type="text" placeholder="Masukan Note untuk Event..."
                                        value="{{ old('venue') }}" />
                                    @error('note')
                                        <label class="small mb-1 text-danger" for="inputNote">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Crew Event</span>
                            <button class="btn btn-sm btn-success" type="button" onclick="addCrewForm()">
                                <i class="me-2" data-feather="user-plus"></i>
                                Add More Crew
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="crew-form-container">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Crew -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputCrew">Crew</label>
                                        <select class="form-select @error('karyawan[]') is-invalid @enderror"
                                            name="karyawan[]" id="karyawan[]">
                                            <option selected disabled hidden>Pilih Crew...</option>
                                            @foreach ($karyawans as $karyawan)
                                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('karyawan[]')
                                            <label class="small mb-1 text-danger" for="inputCrew">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <!-- Form Status Crew -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputStatus">Status</label>
                                        <select class="form-select @error('status_crew') is-invalid @enderror"
                                            name="status_crew" id="status_crew">
                                            <option selected disabled hidden>Pilih Status Crew...</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->status_crew }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_crew')
                                            <label class="small mb-1 text-danger"
                                                for="inputStatus">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <!-- Form Keterangan -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputKeterangan">Keterangan</label>
                                        <select class="form-select @error('keterangan_crew') is-invalid @enderror"
                                            name="keterangan_crew" id="keterangan_crew">
                                            <option selected disabled hidden>Pilih Status Crew...</option>
                                            @foreach ($keterangans as $keterangan)
                                                <option value="{{ $keterangan->id }}">{{ $keterangan->keterangan_crew }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('keterangan_crew')
                                            <label class="small mb-1 text-danger"
                                                for="inputStatus">{{ $message }}</label>
                                        @enderror
                                    </div>
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

    <script>
        let crewFormIndex = 0;

        function addCrewForm() {
            crewFormIndex++;

            const crewFormContainer = document.getElementById('crew-form-container');
            const newCrewForm = document.createElement('div');
            newCrewForm.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">Crew Event ${crewFormIndex}</div>
            <div class="row gx-3 mb-3"> 
                <!-- Form Crew -->
                <div class="mb-3">
                    <label class="small mb-1" for="inputCrew_${crewFormIndex}">Crew</label>
                    <select class="form-select @error('karyawan') is-invalid @enderror" name="karyawan[]" id="karyawan_${crewFormIndex}">
                        <option selected disabled>Pilih Crew...</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                    @error('karyawan')
                        <label class="small mb-1 text-danger" for="inputCrew_${crewFormIndex}">{{ $message }}</label>
                    @enderror
                </div>
                <!-- Form Status Crew -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputStatus_${crewFormIndex}">Status</label>
                        <select class="form-select @error('status_crew') is-invalid @enderror" name="status_crew" id="status_crew_${crewFormIndex}">
                            <option selected disabled hidden>Pilih Status Crew...</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->status_crew }}</option>
                            @endforeach
                        </select>
                        @error('status_crew')
                            <label class="small mb-1 text-danger" for="inputStatus_${crewFormIndex}">{{ $message }}</label>
                        @enderror
                    </div>
                <!-- Form Keterangan -->
                <div class="mb-3">
                    <label class="small mb-1" for="inputKeterangan_${crewFormIndex}">Keterangan</label>
                    <select class="form-select @error('keterangan_crew') is-invalid @enderror" name="keterangan_crew" id="keterangan_crew_${crewFormIndex}">
                        <option selected disabled hidden>Pilih Status Crew...</option>
                            @foreach ($keterangans as $keterangan)
                                <option value="{{ $keterangan->id }}">{{ $keterangan->keterangan_crew }}</option>
                            @endforeach
                    </select>
                    @error('keterangan_crew')
                    <label class="small mb-1 text-danger" for="inputKeterangan_${crewFormIndex}">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        `;

            crewFormContainer.appendChild(newCrewForm);
        }
    </script>

@endsection
