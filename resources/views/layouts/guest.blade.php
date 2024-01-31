<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!--  Title -->
    <title>Indonesia Multimedia Project - IMP</title> <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/landingpage/dist/images/logos/favicon.ico') }}">
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('/landingpage/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/landingpage/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/landingpage/dist/css/style.min.css') }}">
    @yield('css')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        <div class="body-wrapper overflow-hidden">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('/landingpage/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/landingpage/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('/landingpage/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/landingpage/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/landingpage/dist/js/custom.js') }}"></script>
    <script src="{{ asset('/package/dist/libs/moment-js/moment.js') }}"></script>
    @yield('script')
</body>

</html>
