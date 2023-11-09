@extends('layouts/tamplate')
@section('title', 'Karyawan IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
        <p class="mb-4">Data Karyawan IMP Bali.</p>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success allert-dismissable fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
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
                                        <a href="{{ url('karyawan/' . $row->id . '/delete') }}" data-toggle="modal"
                                            data-target="#deleteModal{{ $row->id }}" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i>Hapus</a>

                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sure want to Delete?
                                                        </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" below if you are sure to delete
                                                        the data.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="GET"
                                                            action="{{ url('karyawan/' . $row->id . '/delete') }}">
                                                            @csrf
                                                            <button class="btn btn-danger"
                                                                href="{{ url('karyawan/' . $row->id . '/delete') }}">
                                                                Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
