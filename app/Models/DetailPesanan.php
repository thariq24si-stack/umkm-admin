<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['pesanan_id', 'produk_id', 'qty', 'harga_satuan', 'subtotal'];

    public function produk()
    {
        // Menghubungkan ke tabel UMKM menggunakan umkm_id
        return $this->belongsTo(Umkm::class, 'produk_id', 'umkm_id');
    }
}