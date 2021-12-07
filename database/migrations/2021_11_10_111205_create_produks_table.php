<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->integer('id_kategori');
            $table->string('sku_produk');
            $table->string('nama_produk');
            $table->string('slug');
            $table->integer('harga_produk');
            $table->integer('stok_produk');
            $table->binary('gambar_produk');
            $table->text('deskripsi_produk');
            $table->integer('panjang_produk');
            $table->integer('lebar_produk');
            $table->integer('tinggi_produk');
            $table->integer('berat_produk');
            $table->enum('status', ['Pendik', 'Proses', 'Selesai']);
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
        Schema::dropIfExists('produks');
    }
}
