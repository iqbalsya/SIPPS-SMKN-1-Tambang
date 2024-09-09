<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Gender;
use App\Models\Agama;
use App\Models\Jurusan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $errors = [];

        foreach ($rows as $index => $row) {
            // Validasi
            $validator = Validator::make($row->toArray(), [
                'nis_nisn' => 'required',
                'nama' => 'required',
                'kelas' => 'required',
                'jurusan' => 'required',
                'gender' => 'required',
                'agama' => 'required',
            ]);

            if ($validator->fails()) {
                $errors[] = "Error pada baris " . ($index + 1) . ": " . implode(', ', $validator->errors()->all());
                continue;
            }

            try {
                $kelas = Kelas::firstWhere('nama', $row['kelas']);
                $jurusan = Jurusan::firstWhere('nama', $row['jurusan']);
                $gender = Gender::firstWhere('jenis', $row['gender']);
                $agama = Agama::firstWhere('nama', $row['agama']);

                if (!$kelas || !$jurusan || !$gender || !$agama) {
                    throw new \Exception("Terdapat data yang tidak sesuai ketentuan pada baris ke-" . ($index + 1));
                }

                Siswa::updateOrCreate(
                    ['nis_nisn' => $row['nis_nisn']],
                    [
                        'nama' => $row['nama'],
                        'kelas_id' => $kelas->id,
                        'jurusan_id' => $jurusan->id,
                        'gender_id' => $gender->id,
                        'agama_id' => $agama->id,
                        'tempat_lahir' => $row['tempat_lahir'],
                        'alamat' => $row['alamat'],
                        'telepon' => $row['telepon'],
                        'status_dalam_keluarga' => $row['status_dalam_keluarga'],
                        'anak_ke' => $row['anak_ke'],
                        'nama_ayah' => $row['nama_ayah'],
                        'nama_ibu' => $row['nama_ibu'],
                        'alamat_orang_tua' => $row['alamat_orang_tua'],
                        'telepon_orang_tua' => $row['telepon_orang_tua'],
                    ]
                );
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $errors[] = $e->getMessage();
            }
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }
    }
}
