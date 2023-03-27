<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function formRegister()
    {
        return view('pages.user.form-register.index');
    }

    public function storePengaduan(Request $request)
    {
        // $input =$request->all();

        // dd($input);
        // Masyarakat::create($input);
        User::create([
            'nik'  =>$request->nik,
            'name'  =>$request->name,
            'username'  =>$request->username,
            'telp'  =>$request->telp,
            'password'  => Hash::make($request->password),
            'email'  =>$request->email,
            'jeniskelamin'  =>$request->jeniskelamin,
            'alamat'  =>$request->alamat,
        ]);

        return redirect()->route('form-login')->with('message','Data added Successfully');;
    }

}
