@php
        $nik =Session::get('nik');
        $name =Session::get('name');
        $username =Session::get('username');
        $telp =Session::get('telp');
        $id =Session::get('id');
@endphp

@extends('layouts.user.app')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2></h2>
          </div>

          

        </div>
      </section><!-- End Team Section -->


      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Form Pengaduan</h2>
            </div>

            <div class="row">
                <div class="offset-2 col-lg-8 mt-12 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data" role="form" class="php-email-form" >
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Tanggal Kejadian</label>
                                <input type="date" name="tgl_pengaduan" class="form-control" id="tgl_pengaduan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Foto</label>
                                <input type="file" class="form-control" name="fhoto" id="fhoto" required>
                            </div>
                        <div class="form-group">
                            <label for="name">Lokasi Kejadian</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                          </div>
                        <div class="form-group">
                            <label for="name">Laporan</label>
                            <textarea class="form-control" name="laporan" rows="10" required></textarea>
                        </div>
                        <input type="hidden" name="nik_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status" value="0">
                        <div class="text-center"><button type="submit">Laporkan</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
