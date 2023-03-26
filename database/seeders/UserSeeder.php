<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '3210125678930000',
            'name' => 'Hamba Allah',
            'username' => Str::random(10),
            'telp' => '0855955999',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'jeniskelamin' => ('laki-laki'),
            'alamat' => ('bogor'),

        ]);
    }
}
