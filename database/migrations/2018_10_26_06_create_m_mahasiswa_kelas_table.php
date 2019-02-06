<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMahasiswaKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mahasiswa_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role', 10);
            $table->timestamps();
            $table->integer('id_mhs')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_mhs')->references('id')->on('m_mahasiswas');
            $table->foreign('id_kelas')->references('id')->on('m_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_mahasiswa_kelas');
    }
}
