@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'plus-square')
@section('header-title', 'CRUD Status Crew')
@section('header-subtitle', 'Data Status Crew pada Event Indonesia Multimedia Project')


@section('content')
    <!-- Main page content-->
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

        {{-- Add Modal --}}
        @include('components.modal-status-crew.modal-add')


        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Status Crew</span>
                <a class="btn btn-sm btn-success" type="button" href="{{ route('status-crew.store') }}" data-bs-toggle="modal"
                    data-bs-target="#addStatusModal">
                    <i class="me-2" data-feather="plus"></i>
                    Add New Status
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->status_crew }}</td>
                                    <td>
                                        {{-- Edit Status --}}
                                        <a href="{{ route('status-crew.update', $row->id) }}" class="btn btn-warning btn-sm"
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#updateStatusModal{{ $row->id }}">
                                            <i class="fas
                                        fa-edit me-2"></i>Edit
                                        </a>

                                        {{-- Delete Status --}}
                                        <a href="{{ url('status-crew/' . $row->id . '/delete') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $row->id }}" class="btn btn-danger btn-sm"
                                            type="button">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </a>

                                        <!-- Update Modal -->
                                        @include('components.modal-status-crew.modal-update')

                                        {{-- Delete Modal --}}
                                        @include('components.modal-status-crew.modal-delete')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
