<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMDetailPertemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_detail_pertemuans', function (Blueprint $table) {
            $table->increments('id');
            $table->DateTime('waktu_kehadiran');
            $table->integer('poin');
            $table->string('updated_by');
            $table->double('imei');
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
        Schema::dropIfExists('m_detail_pertemuans');
    }
}
