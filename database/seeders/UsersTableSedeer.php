<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
           'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'guru_id' => 35,
            'password' => ('12345678'),
        ]);

        User::create([
            'name' => 'Wali Kelas',
             'email' => 'walikelas@gmail.com',
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Guru',
             'email' => 'guru@gmail.com',
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'M. Hasmi, S.Pd., M.Pd',
             'email' => 'mhasmi@gmail.com',
             'guru_id' => 1,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Linda Ranti, M.Pd',
             'email' => 'lindarianti@gmail.com',
             'guru_id' => 2,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Merya Fitri, M.Pd',
             'email' => 'meryafitri@gmail.com',
             'guru_id' => 3,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Meri Fajriati, S.Pd. I',
             'email' => 'merifajriati@gmail.com',
             'guru_id' => 4,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => '	Ilko Fazendra, S.Pd',
             'email' => 'ilkofazendra@gmail.com',
             'guru_id' => 5,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Drs. Syahril',
             'email' => 'syahril@gmail.com',
             'guru_id' => 6,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Aprizal, M.Si',
             'email' => 'aprizal@gmail.com',
             'guru_id' => 7,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Hermanto, S.Pd',
             'email' => 'hermanto@gmail.com',
             'guru_id' => 8,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Kisra Ayu, S.Pd',
             'email' => 'kisraayu@gmail.com',
             'guru_id' => 9,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Afri Yendri, S.Pd',
             'email' => 'afriyandri@gmail.com',
             'guru_id' => 10,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Surohman, S.Kom',
             'email' => 'surohman@gmail.com',
             'guru_id' => 11,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Dedy Hendrawan, ST',
             'email' => 'dedyhendrawan@gmail.com',
             'guru_id' => 12,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => '	Afdol, ST',
             'email' => 'afdol@gmail.com',
             'guru_id' => 13,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => '	Nurazimah, S.Psi',
             'email' => 'nurazimah@gmail.com',
             'guru_id' => 14,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Chintia Pratiwi, S.Pd',
             'email' => 'chintiapratiwi@gmail.com',
             'guru_id' => 15,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Renny Anhar, S.Pd',
             'email' => 'rennyanhar@gmail.com',
             'guru_id' => 16,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Muhammad Zeki, S.Pd',
             'email' => 'muhammadzaki@gmail.com',
             'guru_id' => 17,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Yofra Airamunanda, S.Sos',
             'email' => 'yofra@gmail.com',
             'guru_id' => 18,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Mazdalena, S.Th.I',
             'email' => 'mazdalena@gmail.com',
             'guru_id' => 19,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => '	Friska Hilma Pataka, S.si',
             'email' => 'friska@gmail.com',
             'guru_id' => 20,
             'password' => ('12345678'),
         ]);

         User::create([
            'name' => 'Siswa',
             'email' => 'siswa@gmail.com',
             'password' => ('12345678'),
         ]);

    }
}
