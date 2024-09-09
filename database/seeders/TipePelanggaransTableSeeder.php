<?php

namespace Database\Seeders;

use App\Models\TipePelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePelanggaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipePelanggaran::create(['nama' => 'Ringan']);
        TipePelanggaran::create(['nama' => 'Sedang']);
        TipePelanggaran::create(['nama' => 'Berat']);
        TipePelanggaran::create(['nama' => 'Sangat Berat']);
    }
}
