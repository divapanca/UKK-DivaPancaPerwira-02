@extends('layouts.admin.app');

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Kejadian</th>
                        <th>Nama Pelapor</th>
                        <th>Isi Laporan</th>
                        <th>alamat</th>
                        <th>Tanggapan</th>
                        <th>Tanggal Tanggapan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->tgl_pengaduan}}</td>
                        <td>{{ $v->us->name}}</td>
                        <td>{{ $v->laporan}}</td>
                        <td>{{ $v->alamat}}</td>
                        <td>{{ $v->tanga->tanggapan}}</td>
                        <td>{{ $v->tanga->tgl_tanggapan }}</td>
                        <td>
                            @switch($v)
                            @case($v->status == '0')
                            <span class="badge bg-secondary">Pending</span>
                            @break

                            @case($v->status == 'verifikasi')
                            <span class="badge bg-warning">Terverikasi</span>
                            @break
                            @case($v->status == 'proses')
                            <span class="badge bg-success">On Progress</span>
                            @break
                            @case($v->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                            @break

                            @default
                            <span>{{ $v->status }}</span>
                            @endswitch
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center text-gray-400">
                        Data Terselesaikan Tidak Ada
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
