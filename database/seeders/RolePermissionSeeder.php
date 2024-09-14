<?php

// database/seeders/RolePermissionSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permission
        Permission::create(['name' => 'mengakses halaman profile user']);
        Permission::create(['name' => 'mengakses halaman profile siswa']);
        Permission::create(['name' => 'mengakses halaman profile guru']);
        Permission::create(['name' => 'mengakses halaman dashboard']);
        Permission::create(['name' => 'mengakses halaman user management']);
        Permission::create(['name' => 'mengakses halaman siswa']);
        Permission::create(['name' => 'mengakses halaman guru']);
        Permission::create(['name' => 'mengakses halaman kelas']);
        Permission::create(['name' => 'mengakses halaman jurusan']);
        Permission::create(['name' => 'mengakses halaman tipe pelanggaran']);
        Permission::create(['name' => 'mengakses halaman pelanggaran']);
        Permission::create(['name' => 'mengakses halaman sanksi pelanggaran']);
        Permission::create(['name' => 'mengakses halaman lapor pelanggaran']);
        Permission::create(['name' => 'mengakses halaman laporan pelanggaran']);
        Permission::create(['name' => 'mengakses halaman buku pelanggaran']);
        Permission::create(['name' => 'mengakses halaman buku pelanggaran kelas']);
        Permission::create(['name' => 'mengakses halaman lapor keterlambatan']);
        Permission::create(['name' => 'melaporkan keterlambatan']);
        Permission::create(['name' => 'mengelola user']);
        Permission::create(['name' => 'mengelola siswa']);
        Permission::create(['name' => 'mengelola guru']);
        Permission::create(['name' => 'mengelola kelas']);
        Permission::create(['name' => 'mengelola jurusan']);
        Permission::create(['name' => 'mengelola tipe pelanggaran']);
        Permission::create(['name' => 'mengelola pelanggaran']);
        Permission::create(['name' => 'mengelola sanksi pelanggaran']);
        Permission::create(['name' => 'mencatat pelanggaran']);
        Permission::create(['name' => 'mengelola buku pelanggaran']);
        Permission::create(['name' => 'mengelola buku pelanggaran kelas']);
        Permission::create(['name' => 'melaporkan pelanggaran']);
        Permission::create(['name' => 'memvalidasi pelanggaran']);
        Permission::create(['name' => 'mengedit profile siswa']);
        Permission::create(['name' => 'mengedit profile guru']);
        
        // Buat role dan assign permission
        $admin = Role::create(['name' => 'admin']);
        $kesiswaan = Role::create(['name' => 'kesiswaan']);
        $waliKelas = Role::create(['name' => 'wali-kelas']);
        $guru = Role::create(['name' => 'guru']);
        $siswa = Role::create(['name' => 'siswa']);

        $admin->givePermissionTo([
            'mengakses halaman user management',
            'mengakses halaman profile guru',
            'mengakses halaman dashboard',
            'mengakses halaman siswa',
            'mengakses halaman guru',
            'mengakses halaman kelas',
            'mengakses halaman jurusan',
            'mengakses halaman tipe pelanggaran',
            'mengakses halaman pelanggaran',
            'mengakses halaman sanksi pelanggaran',
            'mengakses halaman buku pelanggaran',
            'mengakses halaman lapor keterlambatan',
            'mengelola user',
            'mengelola siswa',
            'mengelola guru',
            'mengelola kelas',
            'mengelola jurusan',
            'mengelola tipe pelanggaran',
            'mengelola pelanggaran',
            'mengelola sanksi pelanggaran',
            'mengelola buku pelanggaran',
            'melaporkan keterlambatan',
            'mengedit profile guru',
        ]);

        $kesiswaan->givePermissionTo([
            'mengakses halaman profile guru',
            'mengakses halaman dashboard',
            'mengakses halaman siswa',
            'mengakses halaman guru',
            'mengakses halaman kelas',
            'mengakses halaman jurusan',
            'mengakses halaman tipe pelanggaran',
            'mengakses halaman pelanggaran',
            'mengakses halaman sanksi pelanggaran',
            'mengakses halaman lapor pelanggaran',
            'mengakses halaman buku pelanggaran',
            'mengakses halaman lapor keterlambatan',
            'melaporkan pelanggaran',
            'mengelola buku pelanggaran',
            'melaporkan keterlambatan',
            'mengedit profile guru',
        ]);

        $waliKelas->givePermissionTo([
            'mengakses halaman profile guru',
            'mengakses halaman dashboard',
            'mengakses halaman siswa',
            'mengakses halaman kelas',
            'mengakses halaman jurusan',
            'mengakses halaman tipe pelanggaran',
            'mengakses halaman pelanggaran',
            'mengakses halaman sanksi pelanggaran',
            'mengakses halaman lapor pelanggaran',
            'mengakses halaman laporan pelanggaran',
            'mengakses halaman buku pelanggaran kelas',
            'mengakses halaman lapor keterlambatan',
            'melaporkan pelanggaran',
            'memvalidasi pelanggaran',
            'mengelola buku pelanggaran kelas',
            'mengedit profile guru',
            'melaporkan keterlambatan'
        ]);

        $guru->givePermissionTo([
            'mengakses halaman profile guru',
            'mengakses halaman dashboard',
            'mengakses halaman siswa',
            'mengakses halaman kelas',
            'mengakses halaman jurusan',
            'mengakses halaman tipe pelanggaran',
            'mengakses halaman pelanggaran',
            'mengakses halaman sanksi pelanggaran',
            'mengakses halaman lapor pelanggaran',
            'mengakses halaman buku pelanggaran',
            'mengakses halaman lapor keterlambatan',
            'melaporkan keterlambatan',
            'melaporkan pelanggaran',
            'mengedit profile guru',
        ]);

        $siswa->givePermissionTo([
            'mengakses halaman profile siswa',
            'mengedit profile siswa',
            'mengakses halaman tipe pelanggaran',
            'mengakses halaman pelanggaran',
            'mengakses halaman sanksi pelanggaran',
        ]);

        $admin = User::where('email', 'admin@gmail.com')->first();
        $admin->assignRole('admin');

        $admin = User::where('email', 'walikelas@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'guru@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'merifajriati@gmail.com')->first();
        $admin->assignRole('kesiswaan');
        
        $admin = User::where('email', 'mhasmi@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'lindarianti@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'meryafitri@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'ilkofazendra@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'syahril@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'aprizal@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'hermanto@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'kisraayu@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'afriyandri@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'surohman@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'dedyhendrawan@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'afdol@gmail.com')->first();
        $admin->assignRole('wali-kelas');

        $admin = User::where('email', 'nurazimah@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'chintiapratiwi@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'rennyanhar@gmail.com')->first();
        $admin->assignRole('guru');
        
        $admin = User::where('email', 'muhammadzaki@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'yofra@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'mazdalena@gmail.com')->first();
        $admin->assignRole('guru');

        $admin = User::where('email', 'friska@gmail.com')->first();
        $admin->assignRole('guru');
    }
}
