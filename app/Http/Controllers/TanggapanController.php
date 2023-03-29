<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TanggapanController extends Controller
{

    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $update =Tanggapan::all();
        return view('pages.admin.tanggapan.index', [
            'data'    => $data,
            'nik'    => $nik,
            'update'    => $update,
        ]);

    }

    public function show($id)
    {
        $show = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $update =Tanggapan::find($id);

        return view('pages.admin.tanggapan.show',[
            'show'   =>$show,
            'nik'    =>$nik,
            'data'   =>$data,
            'update' =>$update,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
        ]);

        $ldate = date('Y-m-d');
        // dd($ldate);
        $di =Session::get('id');
        // dd($di);
        $menu= Pengaduan::findOrFail($id);

        // dd($menu);
        Tanggapan::create([
            'tanggapan' => $request->tanggapan,
            'pengaduan_id'  =>$id,
            'tgl_tanggapan'  =>$ldate,
            'petugas_id'  =>$di,
        ]);
        $menu->update([
            'status' => 'verifikasi'
        ]);
        // dd($menu);
        return redirect()->route('tanggapan.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    public function edit($id)
    {
        $edit = Pengaduan::find($id);
        $update= Pengaduan::findOrFail($id)->where('laporan');
        // dd($update);
        return view('pages.admin.tanggapan.edit',[
            'edit'      =>$edit,
            'update'    =>$update,

        ]);
    }
}
