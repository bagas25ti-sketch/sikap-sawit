<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    public const KATEGORI = ['APD', 'Alat Kerja', 'Lainnya'];

    protected $table = 'perlengkapan';

    protected $fillable = [
        'nama',
        'kategori',
        'stok',
        'stok_minimum',
        'satuan',
        'keterangan',
    ];

    /** Menipis bila stok berada di bawah batas minimum (sesuai Tabel 3.1 proposal). */
    public function getMenipisAttribute(): bool
    {
        return $this->stok < $this->stok_minimum;
    }

    public function getStatusAttribute(): string
    {
        return $this->menipis ? 'Menipis' : 'Aman';
    }

    public function scopeMenipis(Builder $query): Builder
    {
        return $query->whereColumn('stok', '<', 'stok_minimum');
    }
}
