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
            'nama' => 'XII MPLB',
            'guru_id' => 1,
            'jurusan_id' => 4,
        ]);

        Kelas::create([
            'nama' => 'XII TP',
            'guru_id' => 2,
            'jurusan_id' => 2,
        ]);

        Kelas::create([
            'nama' => 'XII TKRO',
            'guru_id' => 3,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => 'XII TBSM',
            'guru_id' => 15,
            'jurusan_id' => 3,
        ]);

        Kelas::create([
            'nama' => 'XI MPLB',
            'guru_id' => 5,
            'jurusan_id' => 4,
        ]);

        Kelas::create([
            'nama' => 'XI TP',
            'guru_id' => 6,
            'jurusan_id' => 2,
        ]);

        Kelas::create([
            'nama' => 'XI TKRO',
            'guru_id' => 7,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => 'XI TBSM',
            'guru_id' => 8,
            'jurusan_id' => 3,
        ]);

        Kelas::create([
            'nama' => 'X MPLB 1',
            'guru_id' => 9,
            'jurusan_id' => 4,
        ]);

        Kelas::create([
            'nama' => 'X MPLB 2',
            'guru_id' => 10,
            'jurusan_id' => 4,
        ]);

        Kelas::create([
            'nama' => 'X TP',
            'guru_id' => 11,
            'jurusan_id' => 2,
        ]);

        Kelas::create([
            'nama' => 'X TKRO',
            'guru_id' => 12,
            'jurusan_id' => 1,
        ]);

        Kelas::create([
            'nama' => 'X TBSM',
            'guru_id' => 13,
            'jurusan_id' => 3,
        ]);
    }
}
