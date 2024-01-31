@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'plus-square')
@section('header-title', 'CRUD Kategori Event')
@section('header-subtitle', 'Data Kategori Event Indonesia Multimedia Project')


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
        @include('components.modal-kategori-event.modal-add')

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Kategori Event</span>
                <a class="btn btn-sm btn-success" type="button" href="{{ route('kategori-event.store') }}"
                    data-bs-toggle="modal" data-bs-target="#addKategoriEvent">
                    <i class="me-2" data-feather="plus"></i>
                    Add New Kategori
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategories as $kategori)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $kategori->kategori_event }}</td>
                                    <td>
                                        {{-- Edit Status --}}
                                        <a href="{{ route('kategori-event.update', $kategori->id) }}"
                                            class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                            data-bs-target="#updateKategoriEvent{{ $kategori->id }}">
                                            <i class="fas
                                        fa-edit me-2"></i>Edit
                                        </a>

                                        {{-- Delete Status --}}
                                        <a href="{{ url('kategori-event/' . $kategori->id . '/delete') }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $kategori->id }}"
                                            class="btn btn-danger btn-sm" type="button">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </a>

                                        <!-- Update Modal -->
                                        @include('components.modal-kategori-event.modal-update')

                                        {{-- Delete Modal --}}
                                        @include('components.modal-kategori-event.modal-delete')
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
