<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Carbon\Carbon;

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
        'alasan',
    ];

    protected $with = ['siswa', 'tipePelanggaran', 'pelanggaran', 'guru', 'kelas'];

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

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function getHariAttribute()
    {
        return Carbon::parse($this->hari_tanggal)->locale('id')->translatedFormat('l');
    }

    public function getFormattedTanggalAttribute()
    {
        return Carbon::parse($this->hari_tanggal)->format('Y-m-d');
    }


}
