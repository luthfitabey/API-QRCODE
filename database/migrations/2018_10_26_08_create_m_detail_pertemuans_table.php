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
            $table->smallInteger('rating');
            $table->string('komentar', 100);
            $table->bigInteger('imei');
            // $table->double('niu');
            $table->integer('id_mhs')->unsigned();
            $table->integer('id_status')->unsigned()->default(1);
            $table->integer('id_pertemuan')->unsigned();
            $table->foreign('id_mhs')->references('id')->on('users');
            $table->foreign('id_status')->references('id')->on('m_statuses');
            $table->foreign('id_pertemuan')->references('id')->on('m_pertemuans');
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
