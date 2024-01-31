@extends('layouts.app')

{{-- Set variables --}}
@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

{{-- Set header section --}}
@section('header-icon', 'briefcase')
@section('header-title', 'Event')
@section('header-subtitle', 'Data Event Indonesia Multimedia Project Cab. Bali')

{{-- Main content --}}
@section('content')
    <div class="container-fluid px-4 mt-n10">
        <!-- Include Alert Component -->
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

        {{-- Table Event --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Event</span>
                <div class="d-flex">
                    <a class="btn btn-sm btn-success me-2" href="{{ route('event.updateEvent', $events) }}" type="button"
                        data-bs-toggle="modal" data-bs-target="#editEventModal">
                        <i class="me-2" data-feather="edit"></i>
                        Update Event
                    </a>
                    <a class="btn btn-sm btn-primary" type="button" onclick="copyContent()">
                        <i class="me-2" data-feather="copy"></i>
                        Copy Event
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableShowEvent" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Loading</th>
                                <th>Tanggal Acara</th>
                                <th>Ukuran</th>
                                <th>Venue</th>
                                <th>Client</th>
                                <th>Kategori</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $events->tanggal_loading_formatted }}</td>
                                <td>{{ $events->getFormattedDateRangeAttribute() }}</td>
                                <td>{{ $events->ukuran_led }}</td>
                                <td>{{ $events->venue }}</td>
                                <td>{{ $events->client }}</td>
                                <td>{{ $events->kategoriEvent->kategori_event }}</td>
                                <td>{{ $events->note }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Update Event Modal --}}
                @include('components.modal-event.modal-update-event')
            </div>
        </div>

        {{-- Table Karyawan --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Karyawan</span>
                <a class="btn btn-sm btn-success" href="{{ route('event.storeCrew', ['eventId' => $events->id]) }}"
                    type="button" data-bs-toggle="modal" data-bs-target="#addCrewModal">
                    <i class="me-2" data-feather="user-plus"></i>
                    Tambah Karyawan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableShowCrew" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Crew</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through event crews --}}
                            @foreach ($eventCrews as $crew)
                                <tr>
                                    <td>{{ $crew->karyawan->nama }}</td>
                                    <td>{{ $crew->status->status_crew }}</td>
                                    <td>{{ $crew->keterangan->keterangan_crew }}</td>
                                    <td>
                                        {{-- Edit Crew Button --}}
                                        <a href="{{ route('event.updateCrew', ['crewId' => $crew->id]) }}"
                                            class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $crew->id }}">
                                            <i class="fas
                                        fa-edit me-2"></i>Edit
                                        </a>

                                        {{-- Delete Crew Button with Modal --}}
                                        <a href="{{ url('event/' . $crew->id . '/delete-crew') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $crew->id }}" class="btn btn-danger btn-sm"
                                            type="button">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </a>

                                        {{-- Update Crew Modal --}}
                                        @include('components.modal-event.modal-update-crew')

                                        {{-- Delete Modal --}}
                                        @include('components.modal-event.modal-delete-crew')
                                    </td>
                                </tr>
                            @endforeach {{-- End loop --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Add Crew Modal -->
            @include('components.modal-event.modal-add-crew')
        </div>
    </div>

    <pre hidden id="myText">
Venue : {{ $events->venue }}
Loading : {{ $events->tanggal_loading_formatted }}
Acara : {{ $tanggal_acara }}
Client : {{ $events->client }}
Spek : {{ $events->ukuran_led }}
Crew :@foreach ($eventCrews as $crew)
{{ $crew->karyawan->nama }},
@endforeach
    </pre>

@endsection

@section('script')

    <script>
        const copyContent = () => {
            const textElement = document.getElementById('myText');
            let text = textElement.innerText;

            navigator.clipboard.writeText(text)
                .then(() => console.log('Content copied to clipboard'))
                .catch(err => console.error('Failed to copy: ', err));
        }
    </script>
@endsection
