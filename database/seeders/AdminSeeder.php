<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'name_petugas' => 'Admin',
            'username' => 'admin',
            'password' => 'password',
            'no_telp' => '08558944423',
            'level' => 'admin',
        ]);
        DB::table('petugas')->insert([
            'name_petugas' => 'Petugas',
            'username' => 'petugas',
            'password' => 'password',
            'no_telp' => '08558944423',
            'level' => 'petugas',
        ]);
    }
}
