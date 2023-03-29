@extends('layouts.admin.app');
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        {{-- <th class="d-none d-md-table-cell">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->us->name }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>
                            <img src="/image/{{ $item->fhoto }}" width="80px" alt=""></td>
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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-400">
                            Data Tidak Ada
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
