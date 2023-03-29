@extends('layouts.user.app')
@section('content')
<section id="portfolio" class="portfolio mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Laporan</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelapor</th>
                        <th scope="col">Pengaduan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @forelse ($data as $item)
                <tbody>
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->us->name}}</td>
                        <td>{{$item->laporan}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                            @switch($item)
                            @case($item->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($item->status == 'verifikasi')
                            <span class="badge bg-warning">Terverikasi</span>
                            @break
                            @case($item->status == 'proses')
                            <span class="badge bg-info">Dalam Proses</span>
                            @break
                            @case($item->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                            @break

                            @default
                            <span>{{ $item->status }}</span>
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('home.show', $item->id) }}" class="btn btn-warning btn-sm">Lihat</a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-400">
                            Data Tidak Ada
                        </td>
                    </tr>
                </tbody>
                @endforelse
            </table>
</section>

@endsection
