<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16);
            $table->string('name', 35);
            $table->string('username', 25);
            $table->string('telp', 13);
            $table->string('password', 32);
            $table->string('email')->unique();
            $table->enum('jeniskelamin', ['laki-laki', 'perempuan']);
            $table->string('alamat',255);
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
        Schema::dropIfExists('masyarakat');
    }
}
