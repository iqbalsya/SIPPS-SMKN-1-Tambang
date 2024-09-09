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
            'nama' => 'M. Hasmi, S.Pd., M.Pd',
            'nip_nuptk' => '9261756657200003',
            'pangkat_gol_jabatan' => 'Pembina Tk. I/IVb',
            'tugas_tambahan' => 'Kepala Sekolah',
            'gender_id' => 1,
            'agama_id' => 1, 
            'tempat_lahir' => 'Teratak',
            'tanggal_lahir' => '1965-05-06',
            'alamat' => null,
            'telepon' => '081371334315',
        ]);

        Guru::create([
            'nama' => 'Linda Ranti, M.Pd',
            'nip_nuptk' => '1935763665210102',
            'pangkat_gol_jabatan' => 'Penata Tk. I/IIIc',
            'tugas_tambahan' => 'Waka Kurikulum',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Limah Puluh Kota',
            'tanggal_lahir' => '1985-06-03',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085271221385',
        ]);

        Guru::create([
            'nama' => 'Merya Fitri, M.Pd',
            'nip_nuptk' => '2839761662300072',
            'pangkat_gol_jabatan' => 'Penata Tk.I/III/c',
            'tugas_tambahan' => 'Waka Sapras',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Kuok',
            'tanggal_lahir' => '1983-07-05',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081276071983',
        ]);

        Guru::create([
            'nama' => 'Meri Fajriati, S.Pd. I',
            'nip_nuptk' => '9840765666130172',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Pariaman',
            'tanggal_lahir' => '1987-05-08',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085355143700',
        ]);

        Guru::create([
            'nama' => 'Ilko Fazendra, S.Pd',
            'nip_nuptk' => '6844770671130092',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Waka Humas',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Simpang',
            'tanggal_lahir' => '1992-05-12',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085363473719',
        ]);

        Guru::create([
            'nama' => 'Drs. Syahril',
            'nip_nuptk' => '9442744647200010',
            'pangkat_gol_jabatan' => 'Pembina Tk. I/IVb',
            'tugas_tambahan' => 'Kepala Jurusan MPLB',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Pariaman',
            'tanggal_lahir' => '1966-11-10',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082389141155',
        ]);

        Guru::create([
            'nama' => 'Aprizal, M.Si',
            'nip_nuptk' => '2736747650200052',
            'pangkat_gol_jabatan' => 'Pembina IV/a',
            'tugas_tambahan' => 'Kepala Jurusan TKRO',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Pariaman',
            'tanggal_lahir' => '1969-04-04',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085274578292',
        ]);

        Guru::create([
            'nama' => 'Hermanto, S.Pd',
            'nip_nuptk' => '5061754657200010',
            'pangkat_gol_jabatan' => 'Penata Tk. I/IIIc',
            'tugas_tambahan' => 'Kepala Jurusan TP',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Sulit Air',
            'tanggal_lahir' => '1976-07-29',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085265276732',
        ]);

        Guru::create([
            'nama' => 'Kisra Ayu, S.Pd',
            'nip_nuptk' => '2340764665210103',
            'pangkat_gol_jabatan' => 'Penata Tk. I/IIIc',
            'tugas_tambahan' => 'Bendahara Bosda',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Durian Jantung',
            'tanggal_lahir' => '1986-10-03',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081365655184',
        ]);

        Guru::create([
            'nama' => 'Afri Yendri, S.Pd',
            'nip_nuptk' => '1041757660200013',
            'pangkat_gol_jabatan' => 'Penata Tk.I/III/b',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Baruh Ginung',
            'tanggal_lahir' => '1980-04-18',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '08126898323',
        ]);

        Guru::create([
            'nama' => 'Surohman, S.Kom',
            'nip_nuptk' => '61377596611200003',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Selat Panjang',
            'tanggal_lahir' => '1981-08-05',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081276336582',
        ]);

        Guru::create([
            'nama' => 'Dedy Hendrawan, ST',
            'nip_nuptk' => '4954756658200022',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => '1978-06-22',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085271834120',
        ]);

        Guru::create([
            'nama' => 'Afdol, ST',
            'nip_nuptk' => '7835758659130142',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Kepala Bengkel TBSM',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Sidorejo',
            'tanggal_lahir' => '1980-05-03',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085833112827',
        ]);

        Guru::create([
            'nama' => 'Nurazimah, S.Psi',
            'nip_nuptk' => '2253760661130123',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Bimbingan Koseling',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Teratak',
            'tanggal_lahir' => '1982-09-21',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '08127636711',
        ]);

        Guru::create([
            'nama' => 'Chintia Pratiwi, S.Pd',
            'nip_nuptk' => '0034769670130093',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Rimbo Panjang',
            'tanggal_lahir' => '1991-07-02',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085278827717',
        ]);

        Guru::create([
            'nama' => 'Renny Anhar, S.Pd',
            'nip_nuptk' => '2557770671130052',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Pekanbaru',
            'tanggal_lahir' => '1992-02-25',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082387745173',
        ]);

        Guru::create([
            'nama' => 'Muhammad Zeki, S.Pd',
            'nip_nuptk' => '2342758661200043',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Baruh Gunung',
            'tanggal_lahir' => '1980-10-10',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082376694746',
        ]);

        Guru::create([
            'nama' => 'Yofra Airamunanda, S.Sos',
            'nip_nuptk' => '1446761662200010',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'KebunDurian',
            'tanggal_lahir' => '1983-11-14',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => null, // tidak ada informasi telepon
        ]);

        Guru::create([
            'nama' => 'Mazdalena, S.Th.I',
            'nip_nuptk' => '0461755657300043',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Kuapan',
            'tanggal_lahir' => '1976-11-29',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082171941001',
        ]);

        Guru::create([
            'nama' => 'Friska Hilma Pataka, S.si',
            'nip_nuptk' => '2733764664210020',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Padang Tarab',
            'tanggal_lahir' => '1986-04-01',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085274056647',
        ]);

        Guru::create([
            'nama' => 'Jhondri Kardo, S.Pd',
            'nip_nuptk' => '14437556582000002',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Selayo',
            'tanggal_lahir' => '1977-01-11',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082388843222',
        ]);

        Guru::create([
            'nama' => 'Neli Maswita, SH',
            'nip_nuptk' => '7260757659210073',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Koto Tinggi',
            'tanggal_lahir' => '1979-09-28',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081268824255',
        ]);

        Guru::create([
            'nama' => 'Zenri Saputra, S.Pd',
            'nip_nuptk' => '2657768669130092',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Kualu Nenas',
            'tanggal_lahir' => '1990-03-25',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082174428860',
        ]);

        Guru::create([
            'nama' => 'Rida Ansari Indah Nst, S.Pd',
            'nip_nuptk' => '6938765666220022',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Tanjung Pinang',
            'tanggal_lahir' => '1987-06-06',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081275451051',
        ]);

        Guru::create([
            'nama' => 'Ida Riani, S.Pd.I',
            'nip_nuptk' => '0847769670230042',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Muuara Sipangi',
            'tanggal_lahir' => '1991-09-15',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082385433582',
        ]);

        Guru::create([
            'nama' => 'Muhammad Irvan, S.Pd',
            'nip_nuptk' => '1',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Padang Mutung',
            'tanggal_lahir' => '1997-07-22',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082294821043',
        ]);

        Guru::create([
            'nama' => 'Nurawan, ST',
            'nip_nuptk' => '3939763664200042',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '1985-06-07',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085278190663',
        ]);

        Guru::create([
            'nama' => 'Sumardi, S.Pd',
            'nip_nuptk' => '19880119 202421 1 002',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Kab. Wonosobo',
            'tanggal_lahir' => '1988-01-19',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => null, // tidak ada informasi telepon
        ]);

        Guru::create([
            'nama' => 'Sri Essa Maylona, ST',
            'nip_nuptk' => '7833761662300152',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Kota Padang',
            'tanggal_lahir' => '1983-05-01',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081329100382',
        ]);

        Guru::create([
            'nama' => 'Rahmad Arif, S.Pd',
            'nip_nuptk' => '6839766667130202',
            'pangkat_gol_jabatan' => 'Ahli Pertama/ IX',
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Kab. Limah Puluh Kota',
            'tanggal_lahir' => '1988-05-07',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081365754950',
        ]);

        Guru::create([
            'nama' => 'Abdul Gafar, S.Pi',
            'nip_nuptk' => '0633749651200082',
            'pangkat_gol_jabatan' => null, // tidak ada informasi pangkat/golongan
            'tugas_tambahan' => null, // tidak ada informasi tugas tambahan
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Lembak Pasang',
            'tanggal_lahir' => '1971-03-01',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081275413044',
        ]);

        Guru::create([
            'nama' => 'Elpa Rianti, S.Pd',
            'nip_nuptk' => '8433765666130452',
            'pangkat_gol_jabatan' => null, // tidak ada informasi pangkat/golongan
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Batu Besurat',
            'tanggal_lahir' => '1987-01-01',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '085218161822',
        ]);

        Guru::create([
            'nama' => 'Marina, S.Pd',
            'nip_nuptk' => '1653764665230212',
            'pangkat_gol_jabatan' => null, // tidak ada informasi pangkat/golongan
            'tugas_tambahan' => 'Wali Kelas',
            'gender_id' => 2,
            'agama_id' => 1,
            'tempat_lahir' => 'Pangkalan Lesung',
            'tanggal_lahir' => '1986-03-21',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081276062997',
        ]);

        Guru::create([
            'nama' => 'Amardi, SE',
            'nip_nuptk' => '8556768669130083',
            'pangkat_gol_jabatan' => null, // tidak ada informasi pangkat/golongan
            'tugas_tambahan' => 'Kepala Tata Usaha',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Ujung Pandang',
            'tanggal_lahir' => '1990-12-24',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '081365943684',
        ]);

        Guru::create([
            'nama' => 'Yolanda Putra',
            'nip_nuptk' => '2', // tidak ada informasi NIP/NUPTK
            'pangkat_gol_jabatan' => null, // tidak ada informasi pangkat/golongan
            'tugas_tambahan' => 'Operator',
            'gender_id' => 1,
            'agama_id' => 1,
            'tempat_lahir' => 'Pekanbaru',
            'tanggal_lahir' => '1996-04-06',
            'alamat' => null, // tidak ada informasi alamat
            'telepon' => '082285757225',
        ]);

    }
}

