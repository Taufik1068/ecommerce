<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = "id_pembayaran";
    protected $fillable = [
        'id_pesanan',
        'id_user',
        'kode_pembayaran',
        'harga_pengiriman',
        'total_pembayaran',
        'status',
        'tanggal_pengiriman',
        'kode_pesanan',
    ];

    public function Pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan', 'id_pesanan', 'id_pesanan');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
