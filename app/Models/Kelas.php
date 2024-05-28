<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'guru_id', 'jurusan_id',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function getJumlahSiswaAttribute()
    {
        return $this->siswa()->count();
    }

    public function getJumlahSiswaLakiLakiAttribute()
    {
        return $this->siswa()->whereHas('gender', function ($query) {
            $query->where('jenis', 'Laki Laki');
        })->count();
    }

    public function getJumlahSiswaPerempuanAttribute()
    {
        return $this->siswa()->whereHas('gender', function ($query) {
            $query->where('jenis', 'Perempuan');
        })->count();
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
