<?php
namespace App\Models;

use App\Models\Media;
use App\Models\Warga;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
    use HasFactory;

    protected $table      = 'umkm';
    protected $primaryKey = 'umkm_id';
    protected $fillable   = ['nama_usaha', 'pemilik_warga_id', 'alamat', 'rt', 'rw', 'kategori', 'kontak', 'deskripsi', 'logo'];

    public function pemilik()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'umkm_id', 'umkm_id');
    }

   public function media()
{
    return $this->morphMany(Media::class, 'mediaable', 'ref_table', 'ref_id')
                ->orderBy('sort_order', 'asc');
}

    // Scope untuk filter
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    // Scope untuk search
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }

    // Scope untuk filter kategori
    public function scopeFilterByCategory($query, $category)
    {
        if ($category) {
            return $query->where('kategori', $category);
        }
        return $query;
    }
}
