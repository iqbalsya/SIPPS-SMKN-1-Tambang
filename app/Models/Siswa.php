<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nis_nisn', 'kelas_id', 'jurusan_id', 'gender_id', 'agama_id', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon', 'nama_ayah', 'nama_ibu', 'status_dalam_keluarga', 'anak_ke', 'alamat_orang_tua', 'telepon_orang_tua'
    ];

    protected $with = ['kelas', 'jurusan', 'gender', 'agama'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function bukuPelanggarans()
    {
        return $this->belongsToMany(Pelanggaran::class, 'buku_pelanggarans')
            ->using(BukuPelanggaran::class)
            ->withPivot(['poin', 'hari_tanggal', 'tipe_pelanggaran_id', 'guru_id'])
            ->withTimestamps();
    }

    public function scopeByKelas($query, $kelas_id)
    {
        return $query->where('kelas_id', $kelas_id);
    }

    public function getTotalPoinAttribute()
    {
        return $this->bukuPelanggarans()->sum('buku_pelanggarans.poin');
    }

    public function getNamaAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getTempatLahirAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getNamaAyahAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getNamaIbuAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getAlamatAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getAlamatOrangTuaAttribute($value)
    {
        return ucwords(strtolower($value));
    }

}
