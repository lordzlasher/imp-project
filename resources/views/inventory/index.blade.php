@extends('layouts/tamplate')
@section('title', 'Inventory IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
    @section('header-title', 'Master Inventory')
    @section('header-description', 'Table Master Data Inventory.')

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
            <a href="{{ route('inventory.create') }}" class="float-right btn btn-primary btn-sm"><i
                    class="fas fa-plus"></i> Tambah Inventory</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($inventory as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jumlah }}</td>
                                <td>{{ $row->satuan }}</td>
                                <td>
                                    <a href="{{ url('inventory/' . $row->id . '/edit') }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="{{ url('inventory/' . $row->id . '/delete') }}" data-toggle="modal"
                                        data-target="#deleteModal{{ $row->id }}" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i>Hapus</a>

                                    <!-- Delete Modal-->
                                    <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        action="{{ url('inventory/' . $row->id . '/delete') }}">
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            href="{{ url('inventory/' . $row->id . '/delete') }}">
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
