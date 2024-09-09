<?php

namespace App\Exports;

use App\Models\BukuPelanggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuPelanggaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BukuPelanggaran::with(['siswa', 'tipePelanggaran', 'pelanggaran', 'guru'])
            ->orderBy('hari_tanggal', 'desc')
            ->get(['siswa_id', 'kelas_id', 'tipe_pelanggaran_id', 'pelanggaran_id', 'guru_id', 'poin', 'hari_tanggal']);
    }

    public function headings(): array
    {
        return [
            'Siswa ID',
            'Kelas ID',
            'Tipe Pelanggaran ID',
            'Pelanggaran ID',
            'Guru ID',
            'Poin',
            'Hari & Tanggal'
        ];
    }
}
