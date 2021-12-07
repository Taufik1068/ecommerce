<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = "pemasoks";
    protected $primaryKey = "id_pemasok";
    protected $fillable = [
        'nama_pemasok',
        'id_user',
        'kode_pemasok',
        'telp_pemasok',
        'alamat_pemasok',
        
    ];
    
    public function User(){
        return $this->belongsTo('App\User','id_user','id');
    }

}
