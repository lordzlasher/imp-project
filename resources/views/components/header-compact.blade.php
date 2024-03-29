<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="@yield('header-icon')"></i></div>
                        @yield('header-title')
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a class="btn btn-sm btn-light text-primary" href="@yield('back-link')">
                        <i class="me-1" data-feather="arrow-left"></i>
                        @yield('back-desc')
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
