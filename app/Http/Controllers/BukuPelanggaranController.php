<?php

namespace App\Http\Controllers;

use App\Models\BukuPelanggaran;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TipePelanggaran;
use App\Models\Pelanggaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class BukuPelanggaranController extends Controller
{
    public function index()
    {
        $bukuPelanggarans = BukuPelanggaran::with(['siswa', 'tipePelanggaran', 'pelanggaran', 'guru'])->get();
        return view('components.buku-pelanggaran.index', compact('bukuPelanggarans'));
    }

    public function create(Request $request, $siswa_id = null)
    {
        $siswa = null;
        if ($siswa_id) {
            $siswa = Siswa::with('kelas')->findOrFail($siswa_id);
        }
        $tipePelanggaran = TipePelanggaran::all();
        $gurus = Guru::all();
        $kelas = Kelas::all();

        return view('components.buku-pelanggaran.create', compact('siswa', 'tipePelanggaran', 'gurus', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'tipe_pelanggaran_id' => 'required',
            'pelanggaran_id' => 'required',
            'guru_id' => 'required',
            'hari_tanggal' => 'required',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        BukuPelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'poin' => $poin,
            'hari_tanggal' => $request->hari_tanggal,
        ]);

        return redirect()->route('buku-pelanggaran.index')->with('success', 'Buku pelanggaran berhasil ditambah.');
    }

    public function edit($id)
    {
        $bukuPelanggaran = BukuPelanggaran::findOrFail($id);
        $siswas = Siswa::where('kelas_id', $bukuPelanggaran->kelas_id)->get();
        $kelas = Kelas::all();
        $tipePelanggaran = TipePelanggaran::all();
        $pelanggarans = Pelanggaran::where('tipe_pelanggaran_id', $bukuPelanggaran->tipe_pelanggaran_id)->get();
        $gurus = Guru::all();

        return view('components.buku-pelanggaran.edit', compact('bukuPelanggaran', 'siswas', 'kelas', 'tipePelanggaran', 'pelanggarans', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'tipe_pelanggaran_id' => 'required',
            'pelanggaran_id' => 'required',
            'guru_id' => 'required',
            'hari_tanggal' => 'required',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        $bukuPelanggaran = BukuPelanggaran::findOrFail($id);
        $bukuPelanggaran->update([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'poin' => $poin,
            'hari_tanggal' => $request->hari_tanggal,
        ]);

        return redirect()->route('buku-pelanggaran.index')->with('success', 'Data buku pelanggaran berhasil diperbarui.');
    }

    public function destroy(BukuPelanggaran $bukuPelanggaran)
    {
        $bukuPelanggaran->delete();
        return redirect()->route('buku-pelanggaran.index')->with('success', 'Data pelanggaran telah dihapus.');
    }

    public function getSiswa($kelasId)
    {
        $siswas = Siswa::where('kelas_id', $kelasId)->get();
        return response()->json($siswas);
    }

    public function getPelanggaran($tipePelanggaranId)
    {
        $pelanggarans = Pelanggaran::where('tipe_pelanggaran_id', $tipePelanggaranId)->get();
        return response()->json($pelanggarans);
    }
}
