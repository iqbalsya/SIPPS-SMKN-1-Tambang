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
            'email' => 'admin@material.com',
            'password' => ('secret')
        ]);

        User::create([
           'name' => 'Guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('password'),
        ]);

    }
}
