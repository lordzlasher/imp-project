@extends('layouts/app')

{{-- Set variables --}}
@php
    $useHeader = true;
    $useCompactHeader = true;
@endphp

{{-- Set header section --}}
@section('header-icon', 'user')
@section('header-title', 'Detail Karyawan')
@section('back-link', route('karyawan.index'))
@section('back-desc', 'Back to Karyawan List')

@section('content')
    <div class="container-fluid px-4">

        {{-- <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active" href="{{ url('karyawan/' . $karyawan->id) }}">Profile</a>
            <a class="nav-link" href="{{ url('karyawan/list-job/' . $karyawan->id) }}">List Job</a>
        </nav>

        <hr class="mt-0 mb-4" /> --}}

        <!-- Wizard navigation-->
        <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
            <!-- Wizard navigation item 1-->
            <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-bs-toggle="tab" role="tab"
                aria-controls="wizard1" aria-selected="true">
                <div class="wizard-step-icon">1</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Profil Karyawan</div>
                    <div class="wizard-step-text-details">Data Karyawan</div>

                </div>
            </a>
            <!-- Wizard navigation item 2-->
            <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-bs-toggle="tab" role="tab"
                aria-controls="wizard2" aria-selected="true">
                <div class="wizard-step-icon">2</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">List Event</div>
                    <div class="wizard-step-text-details">List semua Event Karyawan</div>
                </div>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="cardTabContent">
            <!-- Wizard tab pane item 1-->
            <div class="tab-pane fade show active" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                <div class="row gx-4">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>Karyawan Details</span>
                                <a class="btn btn-sm btn-warning" href="{{ url('karyawan/' . $karyawan->id . '/edit') }}"
                                    type="button">
                                    <i class="me-2" data-feather="user"></i>
                                    Update Karyawan
                                </a>
                            </div>
                            <div class="card-body">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Name -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNama">Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="Masukan nama"
                                            value="{{ $karyawan->nama }}" disabled />
                                    </div>
                                    <!-- Form Alamat -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputAlamat">Alamat</label>
                                        <input class="form-control" name="alamat" type="text"
                                            value="{{ $karyawan->alamat }}" disabled />
                                    </div>
                                    <!-- Form Nomer HP -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNomerHP">Nomer HP</label>
                                        <input class="form-control " name="nomer_hp" type="text"
                                            value="{{ $karyawan->nomer_hp }}" disabled />
                                    </div>
                                    <!-- Form Jenis Bank -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNomerHP">Jenis Bank</label>
                                        <input class="form-control " name="jenis_bank" type="text"
                                            value="{{ $karyawan->jenis_bank }}" readonly />
                                    </div>
                                    <!-- Form Nomer Rekening -->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNomerHP">Nomer Rekening</label>
                                        <input class="form-control " name="nomer_rekening" type="text"
                                            value="{{ $karyawan->nomer_rekening }}" readonly />
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
                                <img id="ktp" class="img-account-profile mt-3"
                                    src="{{ asset('storage/' . $karyawan->ktp) }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wizard tab pane item 2-->
            <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                <div class="col">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>List Job</span>
                            @if (isset($crewEvents[0]))
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('report.crewDownload', $crewEvents[0]->id_karyawan) }}" type="button">
                                    <i class="me-2" data-feather="file"></i> Download Report
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Acara</th>
                                            <th>Venue</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crewEvents as $crewEvent)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $crewEvent->event->getFormattedDateRangeAttribute() }}</td>
                                                <td>{{ $crewEvent->event->venue }}</td>
                                                <td>{{ $crewEvent->status->status_crew }}</td>
                                                <td>{{ $crewEvent->keterangan->keterangan_crew }}</td>
                                                <td class='content-center'>
                                                    <a class="btn btn-sm btn-info me-2"
                                                        href="{{ url('event/' . $crewEvent->event->id) }}"><i
                                                            class="fas fa-eye me-2"></i>Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-0 mb-4" />

                <div class="row justify-content-end">
                    <div class="col-lg-3 mb-4">
                        <!-- Total Event-->
                        <div class="card h-80 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="text mb-2">Total Event</div>
                                        <div class="h1">{{ count($crewEvents) }} <span
                                                class="fw-500 text-primary">events</span>
                                        </div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-briefcase fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
