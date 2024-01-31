@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'archive')
@section('header-title', 'Inventory Log')
@section('header-subtitle', 'Data History Inventory Masuk & Keluar pada Gudang Indonesia Multimedia Project')


@section('content')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
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
                <span>Table Inventory Log</span>
                <a class="btn btn-sm btn-success" href="{{ route('inventory-log.create') }}">
                    <i class="me-2" data-feather="plus"></i>
                    Add New Log
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $log->getTanggalFormatted() }}</td>
                                    <td>{{ $log->inventory->nama }}</td>
                                    <td>
                                        {{ $log->jumlah }}&nbsp;{{ $log->inventory->satuan }}
                                    </td>
                                    <td>
                                        @if ($log->status == 'Barang Masuk')
                                            <span class="badge bg-success">
                                                {{ $log->status }}
                                            </span>
                                        @elseif($log->status == 'Barang Keluar')
                                            <span class="badge bg-danger">
                                                {{ $log->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                {{ $log->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('inventory-log/' . $log->id . '/delete') }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $log->id }}"><i
                                                class="fas fa-trash me-2"></i>Hapus</a>

                                        <!-- Delete Modal -->
                                        @include('components.modal-inventory-log.modal-delete')
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
