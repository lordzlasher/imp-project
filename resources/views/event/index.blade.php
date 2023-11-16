@extends('layouts/tamplate')
@section('title', 'Event IMP')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
    @section('header-title', 'Master Event')
    @section('header-description', 'Table Master Data Event.')

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
            <a href="{{ route('event.create') }}" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                Tambah Event</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Loading</th>
                            <th>Tanggal Acara</th>
                            <th>Ukuran</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($event as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->tanggal_loading }}</td>
                                <td>{{ $row->tanggal_mulai }}</td>
                                <td>{{ $row->ukuran_led }}</td>
                                <td>{{ $row->venue }}</td>
                                <td>{{ $row->status }}</td>
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
