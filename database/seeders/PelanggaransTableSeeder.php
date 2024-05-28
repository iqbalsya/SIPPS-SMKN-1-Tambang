<?php

namespace Database\Seeders;

use App\Models\Pelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelanggaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggaran::create([
            'deskripsi' => 'Merokok di area sekolah',
            'tipe_pelanggaran_id' => 1,
            'poin' => 5,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Bolos selama jam pelajaran',
            'tipe_pelanggaran_id' => 2,
            'poin' => 10,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Terlibat tawuran antar siswa',
            'tipe_pelanggaran_id' => 3,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Menyontek saat ujian',
            'tipe_pelanggaran_id' => 4,
            'poin' => 7,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak menggunakan seragam lengkap',
            'tipe_pelanggaran_id' => 5,
            'poin' => 2,
        ]);
    }
}
