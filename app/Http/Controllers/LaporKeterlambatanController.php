<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\BukuPelanggaran;
use App\Models\Kelas;

class LaporKeterlambatanController extends Controller
{
    public function index()
    {
        $pelanggaranTerlambat = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('Deskripsi', 'Terlambat datang ke sekolah');
        })
        ->orderBy('hari_tanggal', 'desc')
        ->with(['siswa.kelas', 'siswa.gender', 'guru'])
        ->get();

        return view('components.lapor-keterlambatan.index', compact('pelanggaranTerlambat'));
    }

    public function create()
    {
        $pelanggaran = Pelanggaran::where('deskripsi', 'Terlambat Datang ke Sekolah')->first();
        $tipePelanggaran = $pelanggaran->tipePelanggaran;
        $gurus = Guru::all();
        $kelas = Kelas::all();

        return view('components.lapor-keterlambatan.create', compact('pelanggaran', 'tipePelanggaran', 'gurus', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'siswa_id' => 'required',
            'guru_id' => 'required',
            'hari_tanggal' => 'required',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        BukuPelanggaran::create([
            'kelas_id' => $request->kelas_id,
            'siswa_id' => $request->siswa_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'hari_tanggal' => $request->hari_tanggal,
            'poin' => $poin,
        ]);

        return redirect()->route('lapor-keterlambatan.index')->with('success', 'Laporan keterlambatan berhasil disimpan.');
    }
}
