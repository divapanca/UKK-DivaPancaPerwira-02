@extends('layouts.admin.app');
@section('content')

<div class="row">
    <div class="offset-1 col-md-10">
        <div class="card flex-fill">
            <table class="table table-hover dataTable zero-configuration my-0">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Username</th>
                        <th class="d-none d-xl-table-cell">No Telp.</th>
                        <th class="d-none d-xl-table-cell">Jenis Kelamin</th>
                        <th class="d-none d-xl-table-cell">Alamat</th>
                        <!-- <th class="d-none d-md-table-cell">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $item->jeniskelamin }}</td>
                        <td>{{ $item->alamat }}</td>
                        <!-- <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('masyarakat.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Hapus
                            </button>
                        </form>
                        </td> -->

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
