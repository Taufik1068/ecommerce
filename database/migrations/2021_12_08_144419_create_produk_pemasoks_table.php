<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukPemasoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_pemasoks', function (Blueprint $table) {
            $table->bigIncrements('id_produk_pemasok');
            $table->unsignedBigInteger('id_pemasok');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_beli');
            $table->string('nama_produk');
            $table->string('harga_satuan');
            $table->string('total_pembayaran');
            $table->integer('jumlah_pembayaran');
            $table->foreign('id_pemasok')->references('id_pemasok')->on('pemasoks')->onDelete('cascade');
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
        Schema::dropIfExists('produk_pemasoks');
    }
}
