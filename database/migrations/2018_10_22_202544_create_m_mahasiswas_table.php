<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mahasiswas', function (Blueprint $table) {
           $table->increments('id');
           $table->double('niu');
           $table->double('nif');
           $table->integer('angkatan');
           $table->string('nama');
           $table->string('prodi');
           $table->double('nik');
           $table->string('alamat');
           $table->string('no_rek');
           $table->string('nama_rek');
           $table->string('npwp');
           $table->double('no_telp');
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
        Schema::dropIfExists('m_mahasiswas');
    }
}
