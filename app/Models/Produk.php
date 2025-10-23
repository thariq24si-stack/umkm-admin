<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
protected $primaryKey = 'produk_id';
protected $fillable = [
    'umkm_id', 'nama_produk', 'deskripsi', 'harga', 'stok', 'status', 'foto'
];

}
