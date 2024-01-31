@extends('layouts/guest')

@section('content')
    {{-- Hero Section --}}
    <section id="welcome" class="hero-section position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="hero-content my-11 my-xl-0">
                        <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3" data-aos="fade-up"
                            data-aos-delay="200" data-aos-duration="1000"><i
                                class="ti ti-rocket text-secondary fs-6"></i>Indonesia Multimedia Project!
                        </h6>
                        <h1 class="fw-bolder mb-8 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            Selamat datang di <span class="text-primary">Indonesia Multimedia Project</span>
                        </h1>
                        <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="400"
                            data-aos-duration="1000">Sistem informasi manajemen rental LED yang memberikan pengalaman
                            pengguna terdepan dengan tampilan visual menarik, pemantauan
                            real-time, dan fleksibilitas tanpa batas untuk memastikan setiap aspek acara Anda terkelola
                            dengan mudah dan terpercaya.</p>
                        <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="400"
                            data-aos-duration="1000">
                            <a class="btn btn-outline-primary scroll-link" href="{{ route('login') }}">Login!</a>
                        </div>
                    </div>
                </div>

                {{-- Image Banner --}}
                <div class="col-xl-6 d-none d-xl-block">
                    <div class="hero-img-slide position-relative bg-light-primary p-4 rounded">
                        <div class="d-flex flex-row">
                            <div class="">
                                <div class="banner-img-1 slideup mb-10">
                                    <img src="{{ asset('/landingpage/dist/images/hero-img/bannerimg2.svg') }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="banner-img-1 slideup mt-10">
                                    <img src="{{ asset('/landingpage/dist/images/hero-img/bannerimg2.svg') }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="">
                                <div class="banner-img-2 slideDown">
                                    <img src="{{ asset('/landingpage/dist/images/hero-img/bannerimg1.svg') }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="banner-img-2 slideDown">
                                    <img src="{{ asset('/landingpage/dist/images/hero-img/bannerimg1.svg') }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
