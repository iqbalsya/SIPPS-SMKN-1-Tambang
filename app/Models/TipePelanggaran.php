<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function pelanggarans()
    {
        return $this->hasMany(Pelanggaran::class);
    }

     public function bukuPelanggarans()
    {
        return $this->belongsToMany(Pelanggaran::class, 'buku_pelanggarans')
            ->using(BukuPelanggaran::class)
            ->withPivot(['poin', 'hari_tanggal', 'guru_id', 'siswa_id'])
            ->withTimestamps();
    }

    public function getJumlahPelanggaranAttribute()
    {
        return $this->pelanggarans()->count();
    }
}
