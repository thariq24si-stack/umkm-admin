<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaFile extends Model
{
    use HasFactory;

    protected $fillable = ['warga_id', 'filename']; // pastikan sesuai kolom di migration

    public function warga()
{
    return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
}

}
