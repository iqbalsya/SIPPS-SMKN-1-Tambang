<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'deskripsi', 'tipe_pelanggaran_id', 'poin',
    ];

    public function tipePelanggaran()
    {
        return $this->belongsTo(TipePelanggaran::class);
    }

    public function bukuPelanggarans()
    {
        return $this->belongsToMany(Siswa::class, 'buku_pelanggarans')
            ->using(BukuPelanggaran::class)
            ->withPivot(['poin', 'hari_tanggal', 'tipe_pelanggaran_id', 'guru_id'])
            ->withTimestamps();
    }
}
