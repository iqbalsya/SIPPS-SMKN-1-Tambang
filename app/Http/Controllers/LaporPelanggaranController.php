<?php

namespace App\Http\Controllers;

use App\Models\LaporanPelanggaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\TipePelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporPelanggaranController extends Controller
{
    public function index()
    {
        // Mendapatkan guru yang terkait dengan user yang sedang login
        $guru = auth()->user()->guru;

        // Menampilkan laporan pelanggaran yang dilaporkan oleh guru yang sedang login
        $laporanPelanggarans = $guru->laporanPelanggaran()
                            ->with(['siswa', 'pelanggaran'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('components.lapor-pelanggaran.index', compact('laporanPelanggarans'));
    }
        

    // Menampilkan form untuk membuat laporan pelanggaran
    public function create()
    {
        // Mengambil data tipe pelanggaran dan kelas yang tersedia
        $allKelas = Kelas::all(); // Ambil semua kelas
        $tipePelanggaran = TipePelanggaran::all(); // Ambil semua tipe pelanggaran

        // Tampilkan halaman create dengan data kelas dan tipe pelanggaran
        return view('components.lapor-pelanggaran.create', compact('allKelas', 'tipePelanggaran'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
            'pelanggaran_id' => 'required|exists:pelanggarans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari_tanggal' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);

        // Buat laporan pelanggaran dengan data yang valid
        LaporanPelanggaran::create([
            'siswa_id' => $request->siswa_id, // Ambil siswa yang dilaporkan
            'kelas_id' => $request->kelas_id, // Ambil kelas yang relevan
            'pelanggaran_id' => $request->pelanggaran_id, // Ambil jenis pelanggaran
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'guru_id' => Auth::user()->guru->id, // Guru pelapor adalah guru yang sedang login
            'hari_tanggal' => $request->hari_tanggal, // Tanggal pelanggaran
            'alasan' => $request->alasan, // Alasan pelanggaran
        ]);

        // Redirect ke halaman laporan pelanggaran dengan pesan sukses
        return redirect()->route('lapor-pelanggaran.index')->with('success', 'Laporan pelanggaran berhasil dibuat.');
    }
    // Method untuk fetch siswa berdasarkan kelas
    public function getSiswa($kelasId)
    {
        // Fetch siswa berdasarkan kelas yang dipilih
        $siswas = Siswa::where('kelas_id', $kelasId)->get();

        // Return data siswa dalam format JSON untuk digunakan di form
        return response()->json($siswas);
    }

    // Method untuk fetch pelanggaran berdasarkan tipe pelanggaran
    public function getPelanggaran($tipePelanggaranId)
    {
        // Fetch pelanggaran berdasarkan tipe pelanggaran yang dipilih
        $pelanggarans = Pelanggaran::where('tipe_pelanggaran_id', $tipePelanggaranId)->get();

        // Return data pelanggaran dalam format JSON untuk digunakan di form
        return response()->json($pelanggarans);
    }
}
