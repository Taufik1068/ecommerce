<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananProduk extends Model
{
    protected $fillable = ['id_pesanan', 'id_produk', 'jumlah'];
}
