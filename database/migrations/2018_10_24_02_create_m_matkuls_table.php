<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMatkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_matkuls', function (Blueprint $table) {
            $table->string('kode_matkul', 11);
            $table->primary('kode_matkul');
            $table->string('nama_matkul', 40);
            $table->string('singkatan', 10);
            $table->string('jenis', 10);
            $table->integer('kurikulum');
            $table->integer('id_sks')->unsigned();
            $table->foreign('id_sks')->references('id')->on('m_sks')->onDelete('cascade');
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
        Schema::dropIfExists('m_matkuls');
    }
}
