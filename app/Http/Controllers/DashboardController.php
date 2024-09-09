<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuPelanggaran;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $siswaLakiLaki = Siswa::where('gender_id', 1)->count();
        $siswaPerempuan = Siswa::where('gender_id', 2)->count();
        $totalGuru = Guru::count();

        return view('dashboard.index', [
            'totalSiswa' => $totalSiswa,
            'siswaLakiLaki' => $siswaLakiLaki,
            'siswaPerempuan' => $siswaPerempuan,
            'totalGuru' => $totalGuru,
        ]);

    }


    public function getPelanggaranBulanan()
    {
        // Mengambil data pelanggaran dan menghitung jumlah per bulan
        $data = BukuPelanggaran::select(
            DB::raw('count(*) as jumlah'),
            DB::raw('MONTH(hari_tanggal) as bulan')
        )
        ->groupBy('bulan')
        ->get()
        ->mapWithKeys(function($item) {
            return [$item['bulan'] => $item['jumlah']];
        });

        // Menyiapkan array hasil dengan semua bulan dalam urutan yang diinginkan
        $result = [];
        $bulanUrut = [7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6];
        foreach ($bulanUrut as $bulan) {
            $result[] = $data->get($bulan, 0);
        }

        return response()->json($result);
    }



    public function getPelanggaranTerlambat()
    {
        $data = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('deskripsi', 'Terlambat masuk ke kelas tanpa alasan atau keterangan yang tidak dapat dipertanggungjawabkan.');
        })
        ->select(
            DB::raw('count(*) as jumlah'),
            DB::raw('MONTH(hari_tanggal) as bulan')
        )
        ->groupBy('bulan')
        ->get()
        ->mapWithKeys(function($item) {
            return [$item['bulan'] => $item['jumlah']];
        });

        // Menyiapkan array hasil dengan semua bulan dalam urutan yang diinginkan
        $result = [];
        $bulanUrut = [7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6];
        foreach ($bulanUrut as $bulan) {
            $result[] = $data->get($bulan, 0);
        }

        return response()->json($result);
    }


    public function getPelanggaranAlpa()
    {
        $data = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('deskripsi', 'Tidak hadir tanpa keterangan (Alpa).');
        })
        ->select(
            DB::raw('count(*) as jumlah'),
            DB::raw('MONTH(hari_tanggal) as bulan')
        )
        ->groupBy('bulan')
        ->get()
        ->mapWithKeys(function($item) {
            return [$item['bulan'] => $item['jumlah']];
        });

        // Menyiapkan array hasil dengan semua bulan dalam urutan yang diinginkan
        $result = [];
        $bulanUrut = [7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6];
        foreach ($bulanUrut as $bulan) {
            $result[] = $data->get($bulan, 0);
        }

        return response()->json($result);
    }


    public function getJumlahSiswaPerJurusan()
    {
        $data = Jurusan::withCount('siswa')->get()->map(function ($jurusan) {
            return [
                'jurusan' => $jurusan->nama,
                'jumlah' => $jurusan->siswa_count
            ];
        });

        return response()->json($data);
    }


}
