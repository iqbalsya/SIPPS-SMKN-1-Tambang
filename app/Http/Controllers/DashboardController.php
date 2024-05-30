<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuPelanggaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
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

        // Menyiapkan array hasil dengan semua bulan
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = $data->get($i, 0);
        }

        return response()->json($result);
    }


    public function getPelanggaranTerlambat()
    {
        $data = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('deskripsi', 'Terlambat datang ke sekolah');
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

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = $data->get($i, 0);
        }

        return response()->json($result);
    }


    public function getPelanggaranAlpa()
    {
        $data = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('deskripsi', 'Tidak menghadiri sekolah tanpa keterangan');
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

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = $data->get($i, 0);
        }

        return response()->json($result);
    }
}
