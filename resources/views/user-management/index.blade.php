@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'users')
@section('header-title', 'User Management')
@section('header-subtitle', 'Data User pada Event Indonesia Multimedia Project')


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
        @include('components.modal-user.modal-add')


        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Table User</span>
                <a class="btn btn-sm btn-success" type="button" href="{{ route('status-crew.store') }}" data-bs-toggle="modal"
                    data-bs-target="#addUserModal">
                    <i class="me-2" data-feather="plus"></i>
                    Add New User
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{-- Delete User --}}
                                        <a href="{{ url('user-management/' . $user->id . '/delete') }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"
                                            class="btn btn-danger btn-sm" type="button">
                                            <i class="fas fa-trash me-2"></i>Hapus
                                        </a>

                                        {{-- Delete Modal --}}
                                        @include('components.modal-user.modal-delete')
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
