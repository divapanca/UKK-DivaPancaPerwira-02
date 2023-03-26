<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $verikasi = Pengaduan::where('status', 'verifikasi')->count();
        $onprogress = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        $pengaduan =Pengaduan::all()->count();

        return view('pages.petugas.index',[
            'verikasi'  => $verikasi,
            'onprogress'  => $onprogress,
            'selesai'  => $selesai,
            'pengaduan'  => $pengaduan,
        ]);
    }

    public function Pengaduan()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', '0')->get();
        return view('pages.petugas.pengaduan.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    public function Selesai()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', 'selesai')->get();
        return view('pages.petugas.selesai.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }
}
