<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasoks', function (Blueprint $table) {
            $table->bigIncrements('id_pemasok');
            $table->string('nama_pemasok');
            $table->integer('telp_pemasok');
            $table->string('alamat_pemasok');
            $table->string('kode_pemasok');
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
        Schema::dropIfExists('pemasoks');
    }
}
