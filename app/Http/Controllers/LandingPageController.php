<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
class LandingPageController extends Controller
{
    public function index()
    {
        $pengaduan =Pengaduan::all();
        $masyarakat =User::all();
        $totalmas  =User::all()->count();
        $totalpenga  =Pengaduan::all()->count();
        $totaltanga  =Tanggapan::all()->count();
        return view('landing-page',[
            'pengaduan'   =>$pengaduan,
            'masyarakat'   =>$masyarakat,
            'totalmas'   =>$totalmas,
            'totaltanga'   =>$totaltanga,
            'totalpenga'   =>$totalpenga,
        ]);
    }
}
