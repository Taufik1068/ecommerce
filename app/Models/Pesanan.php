<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = "id_pesanan";
    protected $fillable = [
        'id_produk1','id_user','id_produk2','id_produk3','id_produk4','id_produk5','jumlah1',
        'jumlah2','jumlah3','jumlah4','jumlah5','nama_pembeli','alamat_pembeli','telp_pembeli','email_pembeli',
        'jenis_pengiriman','jenis_pembayaran','harga_beli'
    ];

    public function Produk1(){
        return $this->belongsTo('App\Models\Produk','id_produk1','id_produk');
    }
    public function Produk2(){
        return $this->belongsTo('App\Models\Produk','id_produk2','id_produk');
    }
    public function Produk3(){
        return $this->belongsTo('App\Models\Produk','id_produk3','id_produk');
    }
    public function Produk4(){
        return $this->belongsTo('App\Models\Produk','id_produk4','id_produk');
    }
    public function Produk5(){
        return $this->belongsTo('App\Models\Produk','id_produk5','id_produk');
    }

    public function User(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
