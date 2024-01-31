@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'user')
@section('header-title', 'Master Karyawan')
@section('header-subtitle', 'Data Karyawan Indonesia Multimedia Project')


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

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table Karyawan</span>
                <a class="btn btn-sm btn-success" href="{{ route('karyawan.create') }}">
                    <i class="me-2" data-feather="user-plus"></i>
                    Add New Karyawan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomer Hp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->nomer_hp }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info me-2" href="{{ url('karyawan/' . $row->id) }}"> <i
                                                class="fas fa-eye me-2"></i>Detail</a>
                                        <a class="btn btn-sm btn-warning me-2"
                                            href="{{ url('karyawan/' . $row->id . '/edit') }}"> <i
                                                class="fas fa-edit me-2"></i>Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('karyawan/' . $row->id . '/delete') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $row->id }}"><i
                                                class="fas fa-trash me-2"></i>Hapus</a>

                                        <!-- Delete Modal -->
                                        @include('components.modal-delete-karyawan')
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
