<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index ()
    {
        $data = Petugas::all();
        return view ('pages.admin.petugas.index',[
            'data'      => $data
        ]);
    }



    public function store(Request $request)
    {

        $input = $request->all();
        // dd($input);

        Petugas::create($input);
        return redirect()->route('petugas.index');

    }

    public function edit($id)
    {
        $data = Petugas::all();
        $edit = Petugas::find($id);
        return view('pages.admin.petugas.index', [
            'edit'   =>$edit,
            'data'   =>$data,
        ]);
    }
    public function update(Request $request, $id)
    {

        // $input = $request->all();
        // Petugas::update($input);
        $this->validate($request, [
            'name_petugas' => 'required'
        ]);

        $post = Petugas::findOrFail($id);

        $post->update([
            'name_petugas' => $request->name_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'no_telp' => $request->no_telp,
            'level' => $request->level,
        ]);

        // dd($post);
        return redirect()->route('petugas.index');

    }

    public function destroy($id)
    {
        $delete = Petugas::find($id);
        $delete->delete();
        return redirect()->route('petugas.index');
    }
}
