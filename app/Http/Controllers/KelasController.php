<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('guru')->get();
        return view('components.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $gurus = Guru::all();
        $jurusans = Jurusan::all();
        return view('components.kelas.create', compact('gurus', 'jurusans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:gurus,id',
            'jurusan_id' => 'nullable|exists:jurusans,id',
        ], [
            'nama.required' => 'Nama kelas wajib diisi.',
            'guru_id.exists' => 'Guru yang dipilih tidak valid.',
            'jurusan_id.exists' => 'Jurusan yang dipilih tidak valid.',
        ]);

        Kelas::create($validated);

        return redirect()->route('kelas.index')->with('success', 'Kelas telah ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        $gurus = Guru::all();
        $jurusans = Jurusan::all();
        return view('components.kelas.edit', compact('kelas', 'gurus', 'jurusans'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:gurus,id',
            'jurusan_id' => 'nullable|exists:jurusans,id',
        ], [
            'nama.required' => 'Nama kelas wajib diisi.',
            'guru_id.exists' => 'Guru yang dipilih tidak valid.',
            'jurusan_id.exists' => 'Jurusan yang dipilih tidak valid.',
        ]);
        
        $kelas->update($validated);

        return redirect()->route('kelas.index')->with('success', 'Kelas telah diperbarui');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas telah dihapus');
    }
}
