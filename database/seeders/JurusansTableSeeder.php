<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama' => 'Teknik Kendaraan Ringan',
            'guru_id' => 1,
        ]);

        Jurusan::create([
            'nama' => 'Teknik Permesinan',
            'guru_id' => 2,
        ]);

        Jurusan::create([
            'nama' => 'Teknik Bisnis Sepeda Motor',
            'guru_id' => 1,
        ]);

        Jurusan::create([
            'nama' => 'OTK Perkantoran',
            'guru_id' => 2,
        ]);
    }
}
