<?php

namespace App\Http\Controllers\User;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $pengaduan =Pengaduan::all();
        $masyarakat =User::all();

        return view('pages.user.home.index',[
            'pengaduan'   =>$pengaduan,
            'masyarakat'   =>$masyarakat,
        ]);
    }

    public function pengaduan()
    {
        return view('pages.user.pengaduan.index');
    }

        public function store(Request $request)
    {

        $request->validate([
            'tgl_pengaduan'=>['required'],
            'laporan'=>['required'],
        ]);

        $input = $request->all();
        // dd($input);

        if ($image = $request->file('fhoto')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['fhoto'] = "$profileImage";
        }

        Pengaduan::create($input);
        return redirect()->route('sim.laporan')->with('success','Data added Successfully');;
    }

    public function laporan()
    {
        $data =Pengaduan::all();
        return view('pages.user.laporan.index',[
            'data'   =>$data
        ]);
    }

    public function show($id)
    {
        $show =Pengaduan::find($id);
        return view('pages.user.laporan.show',[
            'show'  =>$show
        ]);
    }


}
