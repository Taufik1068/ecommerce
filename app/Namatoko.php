<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Namatoko extends Model
{
    protected $table = 'nama_tokos';
    protected $primarykey= 'id_toko';
    protected $fillable =[
        'id_toko', 'nama_toko', 'alamat_toko', 'telp_toko', 'website','instagram','facebook', 'avatar', 'bio'
    ];
}
