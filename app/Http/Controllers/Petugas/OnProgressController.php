<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class OnProgressController extends Controller
{

    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', 'proses')->get();
        return view('pages.petugas.onprogress.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    public function edit($id)
    {
        $edit = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        return view('pages.petugas.onprogress.edit',[
            'edit'  =>$edit,
            'nik'  =>$nik,
            'data'  =>$data,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
        ]);
        $ldate = date('Y-m-d');

        $menu= Pengaduan::findOrFail($id);
        $di =Session::get('id');

        // dd($menu);
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();

        if ($tanggapan) {
            $data = $tanggapan->update([
                    'tanggapan' => $request->tanggapan,
                    'pengaduan_id'  =>$id,
                    'tgl_tanggapan'  =>$ldate,
                    'petugas_id'  =>$di,
                ]);
        }else{
            $data = Tanggapan::create([
                    'tanggapan' => $request->tanggapan,
                    'pengaduan_id'  =>$id,
                    'tgl_tanggapan'  =>$ldate,
                    'petugas_id'  =>$di,
                ]);
        }

        $menu->update([
            'status' => 'selesai'
        ]);

        return redirect()->route('pengaduan-onprogress.index')
                        ->with('success','Berhasil Menyimpan !');
    }
}
