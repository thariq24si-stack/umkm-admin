<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'nomor_pesanan',
        'warga_id',
        'total',
        'status',
        'alamat_kirim',
        'rt',
        'rw',
        'metode_bayar',
        'bukti_bayar'
    ];

    // Relasi: Pesanan ini dimiliki oleh siapa?
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function details()
{
    return $this->hasMany(DetailPesanan::class, 'pesanan_id');
}
}