<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Indonesia Multimedia Project</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

    <!-- Custom styles for this page -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="{{ asset('tamplate/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <link href="{{ asset('tamplate/css/styles.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('/landingpage/dist/images/logos/favicon.ico') }}">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="nav-fixed">

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        </div>
    </div>
    <!-- Spinner End -->

    @include('components.navbar')
    <div id="layoutSidenav">
        @include('components.sidenav')
        <div id="layoutSidenav_content">
            <main>
                @if ($useHeader)
                    @if ($useCompactHeader)
                        @include('components.header-compact')
                    @else
                        @include('components.header')
                    @endif
                @endif

                @yield('content')

                @include('components.modal-logout')
            </main>
            @include('components.footer')
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- Table plugins -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('tamplate/js/datatables/datatables-simple-demo.js') }}"></script> 
    --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('tamplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('tamplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('tamplate/js/datatables/datatables-demo.js') }}"></script>
    <script src="{{ asset('tamplate/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tamplate/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Chart JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('tamplate/js/scripts.js') }}"></script>

    <!-- LitePicker JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="{{ asset('tamplate/js/litepicker.js') }}"></script>

    <!-- Select2 JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')

</body>

</html>
