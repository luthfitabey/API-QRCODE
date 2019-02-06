<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_ruangs', function (Blueprint $table) {
            $table->string('ruang', 11);
            $table->primary('ruang');
            $table->integer('id_gedung')->unsigned();
            $table->foreign('id_gedung')->references('id')->on('m_gedungs');
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
        Schema::dropIfExists('m_ruangs');
    }
}
