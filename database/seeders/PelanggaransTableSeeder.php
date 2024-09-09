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
            'deskripsi' => 'Terlambat masuk ke kelas tanpa alasan atau keterangan yang tidak dapat dipertanggungjawabkan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak memakai seragam atau atribut sekolah sesuai dengan aturan yang berlaku.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Memakai sandal kecuali ketika  berwudhu.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak mengikuti kegiatan upacara bendera.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Membuang sampah sembarangan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Menggunakan knalpot yang tidak sesuai dengan standar  yang sudah ditentukan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Berada di area parkir sekolah.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Rambut di luar ketentuan yang berlaku.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Berkuku panjang atau di cat.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Parkir kendaraan sembarangan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Berbicara kotor.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Bersikap tidak sopan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Makan minum sambil berdiri atau berbicara.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Mencoret  fasilitas yang ada di sekolah.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Duduk/berbaring di atas meja.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Mengganggu teman saat sedang belajar.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak hadir tanpa keterangan (Alpa).',
            'tipe_pelanggaran_id' => 1,
            'poin' => 25,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidur pada saat jam pelajaran dikelas.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak melaksanakan piket.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Memakai perhiasan yang terlarang atau berlebihan.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Mengenderai sepeda atau sepeda motor pada jam pelajaran di lingkungan sekolah.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Berada di kantin pada jam pelajaran.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

        Pelanggaran::create([
            'deskripsi' => 'Tidak mau membuat tugas pelajaran.',
            'tipe_pelanggaran_id' => 1,
            'poin' => 15,
        ]);

    }
}
