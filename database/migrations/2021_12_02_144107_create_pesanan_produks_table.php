<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_produk');
            $table->string('jumlah');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');

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
        Schema::dropIfExists('pesanan_produks');
    }
}
