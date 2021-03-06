<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->integer('id_produk');
            $table->string('nama_pembeli');
            $table->text('alamat_pembeli')->nullable();
            $table->string('telp_pembeli');
            $table->integer('jumlah_beli');
            $table->string('jenis_pengiriman');
            $table->string('jenis_pembayaran');
            $table->string('harga_beli');
            $table->string('status');
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
        Schema::dropIfExists('pesanan');
    }
}
