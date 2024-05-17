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
            'nis' => '014',
            'nama' => 'Iqbal',
            'kelas' => '11 OTKP',
            'gender' => 'Laki laki'
        ]);

        Siswa::create([
            'nis' => '125',
            'nama' => 'Ibnu',
            'kelas' => '1O TP',
            'gender' => 'Perempuan'
        ]);
    }
}
