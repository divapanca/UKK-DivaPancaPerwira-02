<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.admin.masyarakat.index',[
            'data'   => $data
        ]);
    }

        public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->route('masyarakat.index');
    }
}
