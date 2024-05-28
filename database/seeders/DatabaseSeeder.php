<?php

namespace Database\Seeders;

use App\Models\TipePelanggaran;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@material.com',
        //     'password' => ('secret')
        // ]);

        $this->call([
            UsersTableSedeer::class,
            GendersTableSeeder::class,
            AgamasTableSeeder::class,
            GurusTableSeeder::class,
            JurusansTableSeeder::class,
            KelassTableSeeder::class,
            SiswasTableSeeder::class,
            TipePelanggaransTableSeeder::class,
            PelanggaransTableSeeder::class,
        ]);
    }
}
