@extends('layouts.admin.app');
@section('content')
<div class="offset-2 col-md-8">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="container-fluid">
            <form action="{{ route('tanggapan.edit', $edit->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <h5 class="card-title mb-2" style="text-align: center">{{ $edit->tgl_pengaduan }}</h5>
                <div class="text-muted mb-2" style="text-align: center">{{ $edit->mas->nik }}</div> --}}
                <div class="text-muted mb-2" style="text-align: center"><img
                        src="http://127.0.0.1:8000/image/{{ $edit->fhoto }}" width="150px"></div>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Tanggal  : {{ $edit->created_at }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Nama Pelapor : {{ $edit->us->name }}
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> NIK <a
                            href="#">:
                            &nbsp; {{ $edit->us->nik }}</a>
                    </li>
                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Laporan Pengaduan <a
                            href="#">:
                            &nbsp; {{ $edit->laporan }}</a></li>

                    <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Status :
                        @switch($edit)
                        @case($edit->status == '1')
                        <span class="badge bg-success">Terverifikasi</span>
                        @break
                        @endswitch
                    </a>
                    </li>
                </ul>
                <div class="mb-3 mt-2">
                    <label for="tanggapan" class="form-label">Tanggapan Terakhir Oleh <strong>{{ $edit->tanga->petugas->level  }}</strong></label>
                    <textarea class="form-control mb-3" name="tanggapan" readonly>{{ $edit->tanga->tanggapan }}</textarea>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
