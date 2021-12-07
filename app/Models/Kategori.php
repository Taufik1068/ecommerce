<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = "id_kategori";
    protected $fillable = [
        'id_user',
        'slug',
        'nama_kategori',
        'deskripsi_kategori',
    ];

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function product()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}
