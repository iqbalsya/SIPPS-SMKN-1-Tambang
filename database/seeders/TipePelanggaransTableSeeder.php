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
        TipePelanggaran::create(['nama' => 'Kebersihan']);
        TipePelanggaran::create(['nama' => 'Kerajinan']);
        TipePelanggaran::create(['nama' => 'Kerapian']);
        TipePelanggaran::create(['nama' => 'Sikap dan Tingkah Laku']);
        TipePelanggaran::create(['nama' => 'Kehutanan']);
    }
}
