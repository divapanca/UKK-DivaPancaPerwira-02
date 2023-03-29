@extends('layouts.user.app')
@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container ">
        <h2>Detail</h2>

    </div>
</section>

<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper d-flex justify-content-center">
                            <img src="/image/{{ $show->fhoto }}" alt="" class="text-center">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Pengaduan Information</h3>
                    <ul>
                        <li><strong>Tanggal Kejadian</strong>: {{ $show->created_at }}</li>
                        <li><strong>Nama Pelapor</strong>: {{ $show->us->name }}</li>
                        <li><strong>NIK</strong>: {{ $show->us->nik }}</li>
                        <li><strong>Status</strong>:
                            @switch($show)
                            @case($show->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($show->status == '1')
                            <span class="badge bg-success">Terverikasi</span>
                            @break

                            @case($show->status == '2')
                            <span class="badge bg-success">Dalam Proses</span>
                            @break

                            @case($show->status == '3')
                            <span class="badge bg-success">Selesai</span>
                            @break
                            @default
                            <span>{{ $show->status }}</span>
                            @endswitch
                        </li>
                        <li><strong>Alamat</strong>: {{ $show->alamat }}</li>
                        <li><strong>Yang Menaggapi</strong>:
                            @switch($show)
                            @case($show ->status == '0')
                            Belum Ada Tanggapan
                            @break
                            @default
                            {{ $show->tanga->petugas->level }}
                            @endswitch

                        </li>
                        <li><strong>Tanggapan Terakhir</strong>:
                            @switch($show)
                            @case($show ->status == '0')
                            Belum Ada Tanggapan
                            @break
                            @default
                            {{ $show->tanga->created_at }}
                            @endswitch

                        </li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2>Laporan</h2>
                    <p>
                        {{$show->laporan}}
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
