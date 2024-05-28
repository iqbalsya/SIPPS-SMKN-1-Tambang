<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Gender;
use App\Models\Agama;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('gender', 'agama')->get();
        return view('components.guru.index', compact('guru'));
    }

    public function create()
    {
        $genders = Gender::all();
        $agamas = Agama::all();
        $guru = new Guru();
        return view('components.guru.create', compact('guru', 'genders', 'agamas'));
    }

        public function show($id)
    {
        $guru = Guru::findOrFail($id);
        $totalPelanggaran = $guru->bukuPelanggarans()->count();
        $totalPoin = $guru->bukuPelanggarans()->sum('poin');

        return view('components.guru.guru', compact('guru', 'totalPelanggaran', 'totalPoin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nuptk' => 'required|unique:gurus,nuptk',
            'nip' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nuptk.required' => 'NUPTK guru wajib diisi.',
            'nuptk.unique' => 'NUPTK sudah ada.',
            'gender_id.required' => 'Gender guru wajib diisi.',
            'gender_id.exists' => 'Gender guru tidak valid.',
            'agama_id.required' => 'Agama guru wajib diisi.',
            'agama_id.exists' => 'Agama guru tidak valid.',
        ]);

        Guru::create($validated);

        return redirect()->route('guru.index')->with('success', 'Guru telah ditambahkan');
    }

    public function edit(Guru $guru)
    {
        $genders = Gender::all();
        $agamas = Agama::all();
        return view('components.guru.edit', compact('guru', 'genders', 'agamas'));
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nuptk' => 'required',
            'nip' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nuptk.required' => 'NUPTK guru wajib diisi.',
            'gender_id.required' => 'Gender guru wajib diisi.',
            'gender_id.exists' => 'Gender guru tidak valid.',
            'agama_id.required' => 'Agama guru wajib diisi.',
            'agama_id.exists' => 'Agama guru tidak valid.',
        ]);

        $guru->update($validated);

        return redirect()->route('guru.index')->with('success', 'Guru telah diperbarui');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru telah dihapus');
    }
}
