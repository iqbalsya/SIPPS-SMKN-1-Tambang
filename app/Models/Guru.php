<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nama', 'nip_nuptk', 'pangkat_gol_jabatan', 'tugas_tambahan',
        'gender_id', 'agama_id', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'telepon', 'foto'
    ];

    protected $with = ['gender', 'agama'];

    public function gender()
    {
        return $this->belongsTo(gender::class, 'gender_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }

     public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }

        public function bukuPelanggarans()
    {
        return $this->hasMany(BukuPelanggaran::class);
    }

    public function laporanPelanggaran()
    {
        return $this->hasMany(LaporanPelanggaran::class);
    }

    // public function bukuPelanggarans()
    // {
    //     return $this->belongsToMany(Pelanggaran::class, 'buku_pelanggarans')
    //         ->using(BukuPelanggaran::class)
    //         ->withPivot(['poin', 'hari_tanggal', 'guru_id', 'siswa_id'])
    //         ->withTimestamps();
    // }

    // public function getNamaAttribute($value)
    // {
    //     return ucwords(strtolower($value));
    // }
}
