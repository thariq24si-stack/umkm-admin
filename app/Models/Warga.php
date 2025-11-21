<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
    foreach ($filterableColumns as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->input($column));
        }
    }
    return $query;
}
}
