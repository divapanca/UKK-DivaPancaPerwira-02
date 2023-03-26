@extends('layouts.user.app')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>PENGADUAN MASYARAKAT CISARUA</h1>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ url('pengaduan') }}" class="btn-get-started scrollto mb-5">Create Pengaduan</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/why-us.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cliens Section ======= -->
    <!-- <section id="cliens" class="cliens section-bg">
        <div class="container">

            <div class="row" data-aos="zoom-in">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section>End Cliens Section -->

    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>PENGADUAN</h2>
            </div>

            <div class="row" style="text-align: center">

                @forelse ($pengaduan as $item)
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="pic" style="text-align: center"><img src="/image/{{ $item->fhoto }}" class="img-fluid" width="150px" alt=""></div>
                    <ul>
                        <li style="text-align: center">{{ $item->laporan }}</li>
                    </ul>
                </div>
                @empty
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <ul>
                        <li style="text-align: center">Data Tidak Ada</li>
                    </ul>
                </div>
                @endforelse
            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>ALL Masyarakat</h2>
            </div>

            <div class="row">

                @foreach ($masyarakat as $item)

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start mb-1" data-aos="zoom-in" data-aos-delay="100">
                            <img src="https://ui-avatars.com/api/?name={{ $item->name }}">
                        <div class="member-info">
                            <h4>{{ $item->name }}</h4>
                            <span> NIK :{{ $item->nik }}</span>
                            <span>No Telfon :{{ $item->telp }}</span>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->

@endsection
