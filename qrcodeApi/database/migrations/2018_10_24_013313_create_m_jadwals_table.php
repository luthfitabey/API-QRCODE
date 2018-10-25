<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jadwals', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->date('tgl');
             $table->double('nidn');
             $table->double('niu');
             $table->string('id_matkul');
             $table->string('ruang_kelas');
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
        Schema::dropIfExists('m_jadwals');
    }
}
