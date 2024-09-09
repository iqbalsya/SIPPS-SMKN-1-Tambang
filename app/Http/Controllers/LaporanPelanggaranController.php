<?php

namespace App\Http\Controllers;

use App\Models\LaporanPelanggaran;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\BukuPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPelanggaranController extends Controller
{
    public function index()
    {
        // Ambil data user yang login
        $user = Auth::user();
        
        // Ambil data guru yang terhubung dengan user yang login
        $guru = $user->guru;
    
        // Ambil semua ID kelas yang terkait dengan guru (jika guru mengajar lebih dari satu kelas)
        $kelasIds = $guru->kelas->pluck('id'); // Ini akan mengembalikan collection berisi ID kelas
        
        // Cek apakah guru memiliki kelas
        if (!$guru || $kelasIds->isEmpty()) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    
        // Ambil laporan pelanggaran untuk semua kelas yang diampu oleh guru
        $laporanPelanggarans = LaporanPelanggaran::whereIn('kelas_id', $kelasIds)
        ->orderBy('created_at', 'desc')
        ->get();
        
        // Ambil informasi kelas yang terkait dengan guru
        $kelasList = Kelas::whereIn('id', $kelasIds)->get();
    
        // Kembalikan view dengan data laporan pelanggaran dan kelas yang terkait
        return view('components.laporan-pelanggaran.index', compact('laporanPelanggarans', 'kelasList'));
    }

    public function validateReport($id)
    {
        $laporanPelanggaran = LaporanPelanggaran::findOrFail($id);
        $user = Auth::user();
        $guru = $user->guru;

        // Ambil kelas pertama dari koleksi kelas guru
        $kelas = $guru->kelas->first();

        // Cek apakah kelas ada dan kelas_id dari laporan sama dengan id kelas guru
        if ($kelas && $laporanPelanggaran->kelas_id == $kelas->id) {
            BukuPelanggaran::create([
                'siswa_id' => $laporanPelanggaran->siswa_id,
                'kelas_id' => $laporanPelanggaran->kelas_id,
                'tipe_pelanggaran_id' => $laporanPelanggaran->tipe_pelanggaran_id,
                'pelanggaran_id' => $laporanPelanggaran->pelanggaran_id,
                'guru_id' => $laporanPelanggaran->guru_id,
                'poin' => Pelanggaran::findOrFail($laporanPelanggaran->pelanggaran_id)->poin,
                'hari_tanggal' => $laporanPelanggaran->hari_tanggal,
                'alasan' => $laporanPelanggaran->alasan,
            ]);

            $laporanPelanggaran->delete();

            return redirect()->route('laporan-pelanggaran.index')->with('success', 'Pelanggaran berhasil divalidasi.');
        } else {
            return redirect()->back()->withErrors('Anda tidak memiliki izin untuk memvalidasi laporan ini.');
        }
    }


    public function rejectReport($id)
    {
        $laporanPelanggaran = LaporanPelanggaran::findOrFail($id);
        $user = Auth::user();
        $guru = $user->guru;

        // Cek apakah guru memiliki hak untuk menolak laporan dari salah satu kelas yang ia ampu
        if ($guru->kelas->contains('id', $laporanPelanggaran->kelas_id)) {
            $laporanPelanggaran->delete();
            return redirect()->route('laporan-pelanggaran.index')->with('success', 'Laporan pelanggaran berhasil ditolak.');
        }

        return redirect()->back()->withErrors('Anda tidak memiliki izin untuk menolak laporan ini.');
    }
    
}
