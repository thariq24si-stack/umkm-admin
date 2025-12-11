<?php

// app/Models/Media.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order'
    ];

    // Polymorphic relasi ke entitas lain (produk, warga, dll)
    public function mediaable()
    {
        return $this->morphTo('mediaable', 'ref_table', 'ref_id'); // Menyesuaikan relasi polymorphic
    }
}

