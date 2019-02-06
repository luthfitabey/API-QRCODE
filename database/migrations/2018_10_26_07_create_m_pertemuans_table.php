<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPertemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pertemuans', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('capaian');
            $table->smallInteger('kesesuaian_rkps');
            $table->string('materi', 30);
            $table->string('keterangan', 30);
            $table->Date('tanggal');
            $table->Time('waktu_mulai');
            $table->Time('waktu_selesai');
            $table->timestamps();
            $table->integer('id_jadwal')->unsigned();
            // $table->integer('id_mhs')->unsigned();
            $table->integer('nip_dosen')->index();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('m_jadwals');
            // $table->foreign('id_mhs')->references('id')->on('m_mahasiswas');
            $table->foreign('nip_dosen')->references('nip')->on('m_pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pertemuans');
    }
}
