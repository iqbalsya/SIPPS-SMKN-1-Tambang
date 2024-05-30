<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Gender;
use App\Models\Agama;
use App\Models\jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswa::with('kelas', 'jurusan', 'gender', 'agama', 'bukuPelanggarans')->get();
        return view('components.siswa.index', compact('siswa'));
    }


    public function show($id)
    {
        $siswa = Siswa::with('kelas', 'jurusan', 'bukuPelanggarans')->findOrFail($id);
        $totalPelanggaran = $siswa->bukuPelanggarans->count();
        $totalPoin = $siswa->bukuPelanggarans->sum('pivot.poin');

        return view('components.siswa.siswa', compact('siswa', 'totalPelanggaran', 'totalPoin'));
    }


    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $gender = Gender::all();
        $agama = Agama::all();
        $siswa = new Siswa();
        return view('components.siswa.create', compact('siswa', 'kelas', 'jurusan', 'gender', 'agama'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|string|max:255',
            'nisn' => 'required|unique:siswas,nisn',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
        ], [
            'nis.required' => 'NIS siswa wajib diisi.',
            'nis.unique' => 'NIS sudah ada.',
            'nama.required' => 'Nama siswa wajib diisi.',
            'nisn.required' => 'NISN siswa wajib diisi.',
            'nisn.unique' => 'NISN sudah ada.',
            'kelas_id.required' => 'Kelas siswa wajib diisi.',
            'kelas_id.exists' => 'Kelas siswa tidak valid.',
            'jurusan_id.required' => 'Jurusan siswa wajib diisi.',
            'jurusan_id.exists' => 'Jurusan siswa tidak valid.',
            'gender_id.required' => 'Gender siswa wajib diisi.',
            'gender_id.exists' => 'Gender siswa tidak valid.',
            'agama_id.required' => 'Agama siswa wajib diisi.',
            'agama_id.exists' => 'Agama siswa tidak valid.',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa telah ditambahkan.');
    }


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $gender = Gender::all();
        $agama = Agama::all();

        return view('components.siswa.edit', compact('siswa', 'kelas', 'jurusan', 'gender', 'agama'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
        ], [
            'nis.required' => 'NIS siswa wajib diisi.',
            'nama.required' => 'Nama siswa wajib diisi.',
            'nisn.required' => 'NISN siswa wajib diisi.',
            'jurusan_id.required' => 'Jurusan siswa wajib diisi.',
            'jurusan_id.exists' => 'Jurusan siswa tidak valid.',
            'kelas_id.required' => 'Kelas siswa wajib diisi.',
            'kelas_id.exists' => 'Kelas siswa tidak valid.',
            'gender_id.required' => 'Gender siswa wajib diisi.',
            'gender_id.exists' => 'Gender siswa tidak valid.',
            'agama_id.required' => 'Agama siswa wajib diisi.',
            'agama_id.exists' => 'Agama siswa tidak valid.',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data siswa telah diperbarui');
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa telah dihapus.');
    }
}
