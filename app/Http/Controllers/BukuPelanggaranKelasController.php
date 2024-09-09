<?php
namespace App\Http\Controllers;

use App\Models\BukuPelanggaran;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TipePelanggaran;
use App\Models\Pelanggaran;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuPelanggaranKelasController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Cek apakah user adalah wali kelas dan ambil kelasnya
        $guru = $user->guru; // Pastikan relasi user ke guru ada
        $kelas = $guru->kelas->first();// Relasi Guru ke Kelas

        // Ambil pelanggaran dari siswa di kelas tersebut
        $bukuPelanggarans = BukuPelanggaran::whereHas('siswa', function ($query) use ($kelas) {
            $query->where('kelas_id', $kelas->id);
        })->orderBy('created_at', 'desc')->get();

        return view('components.buku-pelanggaran-kelas.index', compact('bukuPelanggarans', 'kelas'));
    }


    public function show($id)
    {
        $pelanggaran = BukuPelanggaran::with('siswa.kelas', 'siswa.gender', 'guru')->findOrFail($id);
        return view('components.buku-pelanggaran-kelas.show', compact('pelanggaran'));
    }


    public function create(Request $request, $siswa_id = null)
    {
        $siswa = null;
     
        // Assuming `Guru` is related to `User` model
        $guru = Auth::user()->guru;  // Get the currently logged-in teacher (Guru)
     
        // Check if the teacher has a class (handle hasOne or hasMany relationships)
        if ($guru && $guru->kelas->isNotEmpty()) {
            $kelas = $guru->kelas->first();  // If the teacher has multiple classes, get the first one
        } else {
            $kelas = null;  // Handle if the teacher has no class
        }
    
        if ($siswa_id) {
            $siswa = Siswa::with('kelas')->findOrFail($siswa_id);
        }
    
        $tipePelanggaran = TipePelanggaran::all();
        $gurus = Guru::all();
     
        return view('components.buku-pelanggaran-kelas.create', compact('siswa', 'tipePelanggaran', 'gurus', 'kelas', 'guru'));
    }
    
    

    
    public function store(Request $request)
    {
        $user = Auth::user(); // Guru yang sedang login
        if (!$user || !$user->guru) {
            return redirect()->back()->withErrors('Anda tidak memiliki izin sebagai guru.');
        }
    
        $guru = $user->guru;  // Guru login dari relasi
        $kelas = Kelas::where('id', $request->input('kelas_id'))
                      ->where('guru_id', $guru->id) // Pastikan guru adalah wali kelas
                      ->first();
    
        // Jika tidak ada kelas yang valid atau bukan wali kelas
        if (!$kelas) {
            return redirect()->back()->withErrors('Anda tidak berhak mencatat pelanggaran untuk kelas ini.');
        }
    
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
            'pelanggaran_id' => 'required|exists:pelanggarans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari_tanggal' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);
    
        // Cek pelanggaran
        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;
    
        // Simpan data pelanggaran
        BukuPelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'poin' => $poin,
            'hari_tanggal' => $request->hari_tanggal,
            'alasan' => $request->alasan,
        ]);
    
        return redirect()->route('buku-pelanggaran-kelas.index')->with('success', 'Buku pelanggaran berhasil ditambah.');
    }


    public function edit($id)
    {
        $bukuPelanggaran = BukuPelanggaran::findOrFail($id);
    
        $siswas = Siswa::where('kelas_id', $bukuPelanggaran->kelas_id)->get();
        $kelasList = Kelas::all();
        $tipePelanggaran = TipePelanggaran::all(); 
        $pelanggarans = Pelanggaran::where('tipe_pelanggaran_id', $bukuPelanggaran->tipe_pelanggaran_id)->get();
        $gurus = Guru::all(); 
    
        return view('components.buku-pelanggaran-kelas.edit', compact('bukuPelanggaran', 'siswas', 'kelasList', 'tipePelanggaran', 'pelanggarans', 'gurus'));
    }    
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
            'pelanggaran_id' => 'required|exists:pelanggarans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari_tanggal' => 'required|date',
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

        return redirect()->route('buku-pelanggaran-kelas.index')->with('success', 'Data buku pelanggaran berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Temukan data buku pelanggaran berdasarkan ID, atau tampilkan error jika tidak ditemukan
        $bukuPelanggaran = BukuPelanggaran::findOrFail($id);

    
        // Hapus data buku pelanggaran
        $bukuPelanggaran->delete();
    
        return redirect()->route('buku-pelanggaran-kelas.index')->with('success', 'Data buku pelanggaran berhasil dihapus.');
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


    public function getGuru($kelasId)
    {
        $kelas = Kelas::find($kelasId);
        if ($kelas && $kelas->guru) {
            return response()->json(['guru_id' => $kelas->guru->id, 'guru_nama' => $kelas->guru->nama]);
        }
        return response()->json(null, 404);
    }
}
