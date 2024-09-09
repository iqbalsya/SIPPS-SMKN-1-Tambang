<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    protected $fillable = [
        'nama', 'guru_id',
    ];

    protected $with = ['guru'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
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
}

