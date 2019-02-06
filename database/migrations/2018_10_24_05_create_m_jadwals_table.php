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
            $table->string('hari', 6);
            $table->integer('id_kls')->unsigned();
            $table->smallInteger('id_sesi')->index();
            $table->string('id_ruang', 11)->index();
            $table->foreign('id_kls')->references('id')->on('m_kelas');
            $table->foreign('id_sesi')->references('sesi')->on('m_sesis');
            $table->foreign('id_ruang')->references('ruang')->on('m_ruangs');
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
