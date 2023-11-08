@extends('layouts/tamplate')
@section('title', 'Karyawan IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
        <p class="mb-4">Data Karyawan IMP Bali.</p>

        @if (session('massage'))
            <div class="alert alert-success allert-dismissable fade show" role="alert">
                {{ session('massage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">$times;</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Table Karyawan</h6> --}}
                <a href="{{ route('karyawan.create') }}" class="float-right btn btn-primary btn-sm"><i
                        class="fas fa-plus"></i> Tambah Karyawan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomer HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($karyawan as $row)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->nomer_hp }}</td>
                                    <td>
                                        <a href="{{ url('karyawan/' . $row->id . '/edit') }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Edit</a>
                                        <a href="{{ url('karyawan/' . $row->id . '/delete') }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
