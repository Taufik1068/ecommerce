<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Produkpemasok extends Model
{
    protected $table = 'produk_pemasoks';
    protected $primaryKey = "id_produk_pemasok";
    protected $fillable = [
        'id_produk_pemasok',
        'id_pemasok',
        'id_user',
        'tanggal_beli',
        'jumlah_beli',
        'nama_produk',
        'harga_satuan',
        'total_pembayaran',
    ];

    protected $guarded = [];

    public function Pemasok(){
        return $this->belongsTo('App\Models\Pemasok','id_pemasok','id_pemasok');
    }

    public function Kategori(){
        return $this->belongsTo('App\Models\Kategori','id_kategori','id_kategori');
    }

    public function Produk(){
        return $this->belongsTo('App\Models\Produk','id_produk','id_produk');
    }

    public function User(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
