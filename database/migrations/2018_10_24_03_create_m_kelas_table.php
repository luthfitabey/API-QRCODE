<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kelas', 30);
            $table->smallInteger('kapasitas');
            $table->smallInteger('paket_semester');
            $table->integer('id_th')->unsigned();
            $table->string('kode_mk', 11)->index();
            $table->integer('nip_dosen')->index();
            $table->foreign('id_th')->references('id')->on('m_tahun_ajarans');
            $table->foreign('kode_mk')->references('kode_matkul')->on('m_matkuls');
            $table->foreign('nip_dosen')->references('nip')->on('m_pegawais');
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
        Schema::dropIfExists('m_kelas');
    }
}
