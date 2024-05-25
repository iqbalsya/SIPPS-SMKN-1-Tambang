<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Kelas::create([
            'nama' => '12 OTKP',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '12 TP',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '12 TKR',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '12 TBSM',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '11 OTKP',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '11 TP',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '11 TKR',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '11 TBSM',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '10 OTKP',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '10 TP',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '10 TKR',
            'guru_id' => 1,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => '10 TBSM',
            'guru_id' => 2,
            'jurusan_id' => 1,
        ]);
    }
}
