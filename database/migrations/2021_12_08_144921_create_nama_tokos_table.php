<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_tokos', function (Blueprint $table) {
            $table->bigIncrements('id_toko');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_toko');
            $table->text('alamat_toko');
            $table->string('telp_toko');
            $table->string('website');
            $table->string('instagram');
            $table->string('facebook');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('nama_tokos');
    }
}
