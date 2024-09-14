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
        $guru = auth()->user()->guru;

        $laporanPelanggarans = $guru->laporanPelanggaran()
                            ->with(['siswa', 'pelanggaran'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('components.lapor-pelanggaran.index', compact('laporanPelanggarans'));
    }
        

    public function create()
    {
        $allKelas = Kelas::all(); 
        $tipePelanggaran = TipePelanggaran::all();

        return view('components.lapor-pelanggaran.create', compact('allKelas', 'tipePelanggaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
            'pelanggaran_id' => 'required|exists:pelanggarans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari_tanggal' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        LaporanPelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id, 
            'pelanggaran_id' => $request->pelanggaran_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'guru_id' => Auth::user()->guru->id, 
            'hari_tanggal' => $request->hari_tanggal,
            'poin' => $poin,
            'alasan' => $request->alasan, 
        ]);


        return redirect()->route('lapor-pelanggaran.index')->with('success', 'Laporan pelanggaran berhasil dibuat.');
    }


    public function edit($id)
    {
        $laporanPelanggaran = LaporanPelanggaran::findOrFail($id);
        $allKelas = Kelas::all();
        $allSiswa = Siswa::where('kelas_id', $laporanPelanggaran->kelas_id)->get();
        $tipePelanggaran = TipePelanggaran::all();
        $allPelanggaran = Pelanggaran::where('tipe_pelanggaran_id', $laporanPelanggaran->tipe_pelanggaran_id)->get();

        return view('components.lapor-pelanggaran.edit', compact('laporanPelanggaran', 'allKelas', 'allSiswa', 'tipePelanggaran', 'allPelanggaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
            'pelanggaran_id' => 'required|exists:pelanggarans,id',
            'hari_tanggal' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);

        $laporanPelanggaran = LaporanPelanggaran::findOrFail($id);
        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        $laporanPelanggaran->update([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id, 
            'pelanggaran_id' => $request->pelanggaran_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'hari_tanggal' => $request->hari_tanggal,
            'poin' => $poin,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('lapor-pelanggaran.index')->with('success', 'Laporan pelanggaran berhasil diupdate.');
    }
    

    public function destroy($id)
    {
        $laporanPelanggaran = LaporanPelanggaran::findOrFail($id);
        $laporanPelanggaran->delete();

        return redirect()->route('lapor-pelanggaran.index')->with('success', 'Laporan pelanggaran berhasil dihapus.');
    }



    public function getSiswa($kelasId)
    {
        // Fetch siswa berdasarkan kelas yang dipilih
        $siswas = Siswa::where('kelas_id', $kelasId)->get();

        // Return data siswa dalam format JSON untuk digunakan di form
        return response()->json($siswas);
    }


    public function getPelanggaran($tipePelanggaranId)
    {
        // Fetch pelanggaran berdasarkan tipe pelanggaran yang dipilih
        $pelanggarans = Pelanggaran::where('tipe_pelanggaran_id', $tipePelanggaranId)->get();

        // Return data pelanggaran dalam format JSON untuk digunakan di form
        return response()->json($pelanggarans);
    }
}
