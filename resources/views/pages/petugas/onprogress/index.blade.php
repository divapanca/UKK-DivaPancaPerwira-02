@extends('layouts.admin.app');

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th class="d-none d-xl-table-cell">NIK</th>
                        <th class="d-none d-xl-table-cell">Laporan</th>
                        <th>Image</th>
                        <th>status</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->us->nik }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td><img src="/image/{{ $item->fhoto }}" width="80px" alt=""></td>
                        <td>
                            @switch($item)
                            @case($item->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($item->status == 'verifikasi')
                            <span class="badge bg-warning">Terverikasi</span>
                            @break
                            @case($item->status == 'proses')
                            <span class="badge bg-success">Dalam Proses</span>
                            @break
                            @case($item->status == 'selesai')
                            <span class="badge bg-danger">Selesai</span>
                            @break

                            @default
                            <span>{{ $item->status }}</span>
                            @endswitch
                        </td>
                        <td>
                            @switch($item)
                            @case($item->status == 'proses')
                            <a class="btn btn-primary btn-sm" href="{{ route('pengaduan-onprogress.edit', $item->id) }}">Beri Tanggapan</a>
                            @break
                            @default
                            <span class="badge bg-warning">Terverifikasi</span>
                            @endswitch
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center text-gray-400">
                        Data Onprogress Tidak Ada
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
