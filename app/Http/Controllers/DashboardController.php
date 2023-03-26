<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataadmin  =Petugas::where('level', 'admin')->count();
        $datapetugas  =Petugas::where('level', 'petugas')->count();
        $datamasyarakat  =User::all()->count();
        $datapengaduan  =Pengaduan::all()->count();
        $a = session()->get('name_petugas');
        // dd($a);
        return view ('pages.admin.dashboard.index',[
            'dataadmin'    =>$dataadmin,
            'datapetugas'    =>$datapetugas,
            'datamasyarakat'    =>$datamasyarakat,
            'datapengaduan'    =>$datapengaduan,
        ]);
    }
    public function laporan(Request $request)
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $pengaduan = Pengaduan::all();
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        return view('pages.admin.laporan.index', [
            'data'    => $data,
            'nik'    => $nik,
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to,

        ]);
    }

    public function getLaporan(Request $request, )
    {
        $from = $request->from . ' ' ;
        $to = $request->to . ' ' ;

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        // dd($pengaduan);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();

        // dd($pengaduan);

        return view('pages.admin.laporan.index', [
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to,
            'data'    => $data,
            'nik'    => $nik

        ]);
    }
    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        $penga = Tanggapan::all();

        // dd($pengaduan);
        $pdf = PDF::loadview('pages.admin.laporan.pdf', [
            'pengaduan' => $pengaduan,
            'penga' => $penga,

            ])->setPaper('a4', 'landscape');
        // dd($pdf);
        return $pdf->download('laporan-pengaduan-sukamahi.pdf');
    }

}
