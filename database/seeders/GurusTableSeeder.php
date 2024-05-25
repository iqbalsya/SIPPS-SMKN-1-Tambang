<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GurusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama' => 'Guru 1',
            'nuptk' => '123456',
            'nip' => '654321',
            'posisi' => 'Wali Kelas 1',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1980-01-01',
            'alamat' => 'Jl. Pahlawan',
            'telepon' => '08123456787',
        ]);

        Guru::create([
            'nama' => 'Guru 2',
            'nuptk' => '123457',
            'nip' => '654322',
            'posisi' => 'Wali Kelas 2',
            'gender_id' => 2,
            'agama_id' => 2,
            'tempat_lahir' => 'Yogyakarta',
            'tanggal_lahir' => '1985-02-02',
            'alamat' => 'Jl. Diponegoro',
            'telepon' => '08123456786',
        ]);
    }
}
