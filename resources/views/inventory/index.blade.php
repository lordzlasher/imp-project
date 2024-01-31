@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'box')
@section('header-title', 'Master Inventory')
@section('header-subtitle', 'Data Inventory Gudang Indonesia Multimedia Project Cab. Bali')


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
                <span>Table Inventory</span>
                <a class="btn btn-sm btn-success" href="{{ route('inventory.create') }}">
                    <i class="me-2" data-feather="plus"></i>
                    Add New Inventory
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>{{ $row->satuan }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning me-2"
                                            href="{{ url('inventory/' . $row->id . '/edit') }}"><i
                                                class="fas fa-edit me-2"></i>Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('inventory/' . $row->id . '/delete') }}" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $row->id }}"><i
                                                class="fas fa-trash me-2"></i>Hapus</a>

                                        <!-- Delete Modal -->
                                        @include('components.modal-delete-inventory')
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
