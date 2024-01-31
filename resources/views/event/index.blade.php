@extends('layouts/app')

@php
    // Variabel untuk mengontrol tampilan header
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'briefcase')
@section('header-title', 'Master Event')
@section('header-subtitle', 'Data Event Indonesia Multimedia Project Cab. Bali')

@section('content')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-end align-items-sm-center flex-column flex-sm-row mb-4">
            <!-- Date range picker example-->
            <!-- Form untuk filter berdasarkan rentang tanggal -->
            <form method="post" class='d-flex justify-content-end align-items-sm-center flex-column flex-sm-row mb-4'
                enctype="multipart/form-data" action="{{ route('filter') }}">
                @csrf
                <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                    <input class="form-control ps-0 pointer" id="litepickerRangeDashboard" name="filter_date"
                        placeholder="Select date range..." />
                </div>
                <div class="ms-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </form>
        </div>

        <!-- Include Alert Component -->
        <!-- Menampilkan alert sesuai dengan jenisnya (success, warning, danger) -->
        @if (session('success'))
            @component('components.alert')
                @slot('alertType', 'success')
                @slot('alertMessage')
                    {{ session('success') }}
                @endslot
            @endcomponent
        @elseif(session('warning'))
            @component('components.alert')
                @slot('alertType', 'warning')
                @slot('alertMessage')
                    {{ session('warning') }}
                @endslot
            @endcomponent
        @elseif(session('danger'))
            @component('components.alert')
                @slot('alertType', 'danger')
                @slot('alertMessage')
                    {{ session('danger') }}
                @endslot
            @endcomponent
        @else
        @endif

        <!-- Tabel untuk Event Bali -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Event Bali</span>
                <div class="d-flex">
                    <!-- Tombol untuk menambahkan event baru -->
                    <a class="btn btn-sm btn-success me-2" href="{{ route('event.create') }}">
                        <i class="me-2" data-feather="plus"></i>
                        Add New Event
                    </a>
                    <!-- Tombol untuk mengunduh laporan Excel dan PDF -->
                    @isset($eventBali[0])
                        <a class="btn btn-sm btn-primary me-2"
                            href="{{ route('report.excel.eventDownload', $eventBali[0]->id_kategori_event) }}" target="_blank">
                            <i class="me-2" data-feather="layout"></i>
                            Report Excel
                        </a>
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('report.eventKategori', $eventBali[0]->id_kategori_event) }}" target="_blank">
                            <i class="me-2" data-feather="file"></i>
                            Report PDF
                        </a>
                    @endisset
                </div>
            </div>
            <div class="card-body">
                <!-- Tabel untuk menampilkan data Event Bali -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableBali" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Loading</th>
                                <th>Tanggal Acara</th>
                                <th>Ukuran</th>
                                <th>Venue</th>
                                <th>Client</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Menampilkan data Event Bali -->
                            @foreach ($eventBali as $event)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $event->getTanggalLoadingFormattedAttribute() }}</td>
                                    <td>{{ $event->getFormattedDateRangeAttribute() }}</td>
                                    <td>{{ $event->ukuran_led }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->client }}</td>
                                    <td>{{ $event->kategoriEvent->kategori_event }}</td>
                                    <td>
                                        <!-- Tombol untuk melihat detail event dan menghapus event -->
                                        <a class="btn btn-sm btn-info me-2" href="{{ url('event/' . $event->id) }}"><i
                                                class="fas fa-eye me-2"></i>Detail</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('event/' . $event->id . '/delete') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $event->id }}"><i
                                                class="fas fa-trash me-2"></i>Hapus</a>

                                        <!-- Delete Modal -->
                                        <!-- Include modal untuk konfirmasi penghapusan event -->
                                        @include('components.modal-event.modal-delete-event')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tabel untuk Event Surabaya -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Event Surabaya</span>
                <div class="d-flex">
                    <!-- Tombol untuk mengunduh laporan PDF -->
                    @isset($eventSurabaya[0])
                        <a class="btn btn-sm btn-primary me-2"
                            href="{{ route('report.excel.eventDownload', $eventSurabaya[0]->id_kategori_event) }}"
                            target="_blank">
                            <i class="me-2" data-feather="layout"></i>
                            Report Excel
                        </a>
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('report.eventKategori', $eventSurabaya[0]->id_kategori_event) }}" target="_blank">
                            <i class="me-2" data-feather="file"></i>
                            Report PDF
                        </a>
                    @endisset
                </div>
            </div>
            <div class="card-body">
                <!-- Tabel untuk menampilkan data Event Surabaya -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableSurabaya" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Loading</th>
                                <th>Tanggal Acara</th>
                                <th>Ukuran</th>
                                <th>Venue</th>
                                <th>Client</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Menampilkan data Event Surabaya -->
                            @foreach ($eventSurabaya as $event)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $event->getTanggalLoadingFormattedAttribute() }}</td>
                                    <td>{{ $event->getFormattedDateRangeAttribute() }}</td>
                                    <td>{{ $event->ukuran_led }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>{{ $event->client }}</td>
                                    <td>{{ $event->kategoriEvent->kategori_event }}</td>
                                    <td>
                                        <!-- Tombol untuk melihat detail event dan menghapus event -->
                                        <a class="btn btn-sm btn-info me-2" href="{{ url('event/' . $event->id) }}"><i
                                                class="fas fa-eye me-2"></i>Detail</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('event/' . $event->id . '/delete') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $event->id }}"><i
                                                class="fas fa-trash me-2"></i>Hapus</a>

                                        <!-- Delete Modal -->
                                        <!-- Include modal untuk konfirmasi penghapusan event -->
                                        @include('components.modal-event.modal-delete-event')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr class="mt-0 mb-4" />

        <!-- Widget untuk menampilkan jumlah total event -->
        <div class="event justify-content-end">
            <div class="col-lg-3 mb-4">
                <!-- Total Event-->
                <div class="card h-80 border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-gevent-1">
                                <div class="text mb-2">Total Event</div>
                                <div class="h1">{{ count($events) }} <span class="fw-500 text-primary">events</span>
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-briefcase fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Date Picker Script --}}
    <!-- Script untuk menginisialisasi date picker -->
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const litepickerRangeDashboard = document.getElementById('litepickerRangeDashboard');
            if (litepickerRangeDashboard) {
                const startDateSession = '{{ session('start_date') }}';
                const endDateSession = '{{ session('end_date') }}';

                const startDate = startDateSession ? new Date(startDateSession) : new Date();
                const endDate = endDateSession ? new Date(endDateSession) : new Date();

                new Litepicker({
                    element: litepickerRangeDashboard,
                    startDate: startDate,
                    endDate: endDate,
                    singleMode: false,
                    numberOfMonths: 2,
                    numberOfColumns: 2,
                    format: 'MMM DD, YYYY',
                    plugins: ['ranges'],
                    dropdowns: {
                        months: true,
                        years: true
                    },
                });
            }
        });
    </script>
@endsection
