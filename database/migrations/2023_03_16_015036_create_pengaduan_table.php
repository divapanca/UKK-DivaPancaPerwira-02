<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->datetime('tgl_pengaduan');
            $table->unsignedBigInteger('nik_id');
            $table->text('laporan');
            $table->string('fhoto',255);
            $table->string('alamat',255);
            $table->enum('status',['0','verifikasi','proses','selesai']);
            $table->foreign('nik_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
