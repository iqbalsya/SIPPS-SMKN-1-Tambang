<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'kelas_id' => 1,
            'jurusan_id' => 1,
            'gender_id' => 1,
            'agama_id' => 1,
            'nama' => 'Siswa 1',
            'nis' => '123456',
            'nisn' => '654321',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2005-05-05',
            'alamat' => 'Jl. Merdeka',
            'nama_ayah' => 'Bapak Siswa 1',
            'nama_ibu' => 'Ibu Siswa 1',
            'telepon' => '08123456789',
        ]);

        Siswa::create([
            'kelas_id' => 2,
            'gender_id' => 2,
            'jurusan_id' => 2,
            'agama_id' => 2,
            'nama' => 'Siswa 2',
            'nis' => '123457',
            'nisn' => '654322',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2006-06-06',
            'alamat' => 'Jl. Sudirman',
            'nama_ayah' => 'Bapak Siswa 2',
            'nama_ibu' => 'Ibu Siswa 2',
            'telepon' => '08123456788',
        ]);
    }
}
