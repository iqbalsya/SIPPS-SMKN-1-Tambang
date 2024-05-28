<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BukuPelanggaran extends Pivot
{
    protected $table = 'buku_pelanggarans';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tipe_pelanggaran_id',
        'pelanggaran_id',
        'guru_id',
        'poin',
        'hari_tanggal',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tipePelanggaran()
    {
        return $this->belongsTo(TipePelanggaran::class, 'tipe_pelanggaran_id');
    }

    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class, 'pelanggaran_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
