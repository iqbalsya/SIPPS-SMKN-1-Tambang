<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Siswa;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Periksa dan dapatkan siswa berdasarkan nama jika ada
            $siswa = $row['nama_siswa'] ? Siswa::where('nama', $row['nama_siswa'])->first() : null;

            if ($row['nama_siswa'] && !$siswa) {
                throw new \Exception("Siswa dengan nama '{$row['nama_siswa']}' tidak ditemukan.");
            }

            // Periksa apakah email sudah ada di database
            if (User::where('email', $row['email'])->exists()) {
                throw new \Exception("Email '{$row['email']}' sudah terdaftar.");
            }

            // Buat user baru
            $user = User::create([
                'name' => $row['nama_user'],
                'email' => $row['email'],
                'password' => $row['password'],
                'siswa_id' => $siswa ? $siswa->id : null, // Jika siswa tidak ada, set ke null
            ]);

            // Tambahkan peran ke pengguna
            $role = Role::where('name', $row['role'])->first();
            if ($role) {
                $user->assignRole($role);
            } else {
                throw new \Exception("Peran '{$row['role']}' tidak ditemukan.");
            }
        }
    }
}
