<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pegawais', function (Blueprint $table) {
            $table->integer('id')->increments();
            $table->integer('nip')->unique();
            $table->primary('id');
            $table->string('nama', 40);
            $table->bigInteger('no_telp');
            $table->smallInteger('role');
            //int 1
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
        Schema::dropIfExists('m_pegawais');
    }
}
