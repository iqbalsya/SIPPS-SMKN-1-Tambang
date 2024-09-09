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

    protected $with = ['guru', 'jurusan'];

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

    public function bukuPelanggaran()
    {
        return $this->hasMany(BukuPelanggaran::class);
    }

    public function upgrade()
    {
        $currentName = $this->nama;

        // Regular expression to identify the numeric part and suffix
        if (preg_match('/^(X|XI|XII) (.+)$/', $currentName, $matches)) {
            $yearPart = $matches[1];
            $suffix = $matches[2];
            
            // Determine the next year part
            switch ($yearPart) {
                case 'X':
                    $newYearPart = 'XI';
                    break;
                case 'XI':
                    $newYearPart = 'XII';
                    break;
                case 'XII':
                    // Class XII should not be upgraded
                    return false;
                default:
                    $newYearPart = $yearPart;
            }
            
            // Create new name
            $newName = $newYearPart . ' ' . $suffix;

            // Check if the new class name already exists
            if (self::where('nama', $newName)->exists()) {
                return false;
            }

            // Update the name of the class
            $this->update(['nama' => $newName]);
            return true;
        }

        return false;
    }
}
