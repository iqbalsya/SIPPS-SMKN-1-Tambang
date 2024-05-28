<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nama', 'nuptk', 'nip', 'posisi',
        'gender_id', 'agama_id', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'telepon'
    ];

    public function gender()
    {
        return $this->belongsTo(gender::class, 'gender_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
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
}
