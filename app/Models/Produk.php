<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Produkpemasok;
use App\Namatoko;

class Produk extends Model
{
    protected $table = "produks";
    protected $primaryKey = "id_produk";
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'id_produk_pemasok',
        'id_user',
        'sku_produk',
        'nama_produk',
        'slug',
        'harga_produk',
        'stok_produk',
        'gambar_produk',
        'deskripsi_produk',
        'panjang_produk',
        'lebar_produk',
        'tinggi_produk',
        'berat_produk',
        'status'
    ];
    protected $guarded = [];

    public function Kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori', 'id_kategori');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function Produkpemasok()
    {
        return $this->belongsTo('App\Models\Produkpemasok', 'id_produk_pemasok', 'id_produk_pemasok');
    }

    public function toko()
    {
        return $this->belongsTo(Namatoko::class, 'id_user', 'id_user');
    }
}
