<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mahasiswas', function (Blueprint $table) {
          $table->increments('id');
           $table->integer('niu')->unique();
           // $table->primary('id');
           $table->integer('nif')->unique();
           $table->smallInteger('angkatan');
           $table->string('nama', 40);
           $table->string('prodi', 30);
           $table->bigInteger('nik');
           $table->string('alamat', 40);
           $table->bigInteger('no_rek');
           $table->string('nama_rek', 40);
           $table->string('npwp', 20);
           $table->bigInteger('no_telp');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('m_mahasiswas');
    }
}
