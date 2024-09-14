<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Gender;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('gender', 'agama')->get();
        return view('components.guru.index', compact('guru'));
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        $totalPelanggaran = $guru->bukuPelanggarans()->count();
        $totalPoin = $guru->bukuPelanggarans()->sum('poin');

        return view('components.guru.guru', compact('guru', 'totalPelanggaran', 'totalPoin'));
    }


    public function profile()
    {
        $user = Auth::user();
        $guru = Guru::where('id', $user->guru_id)->firstOrFail();
    
        $totalPelanggaran = $guru->bukuPelanggarans()->count();
    
        return view('components.guru-profile.profile', compact('guru', 'totalPelanggaran'));
    }

    public function profileEdit(Guru $guru)
    {
        $user = Auth::user();
        $guru = Guru::where('id', $user->guru_id)->firstOrFail();

        $genders = Gender::all();
        $agamas = Agama::all();
        return view('components.guru-profile.edit', compact('guru', 'genders', 'agamas'));
    }

    public function ProfileUpdate(Request $request, Guru $guru)
    {
        $user = Auth::user();
        $guru = Guru::where('id', $user->guru_id)->firstOrFail();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip_nuptk' => 'required|string|max:255|unique:gurus,nip_nuptk,' . $guru->id,
            'pangkat_gol_jabatan' => 'nullable|string|max:255',
            'tugas_tambahan' => 'nullable|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip_nuptk.required' => 'NIP/NUPTK guru wajib diisi.',
            'nip_nuptk.unique' => 'NIP/NUPTK sudah ada.',
            'gender_id.required' => 'Gender guru wajib diisi.',
            'gender_id.exists' => 'Gender guru tidak valid.',
            'agama_id.required' => 'Agama guru wajib diisi.',
            'agama_id.exists' => 'Agama guru tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Upload atau update foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotoguru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('guru.profile')->with('success', 'Guru telah diperbarui');
    }


    public function create()
    {
        $genders = Gender::all();
        $agamas = Agama::all();
        $guru = new Guru();
        return view('components.guru.create', compact('guru', 'genders', 'agamas'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip_nuptk' => 'required|unique:gurus,nip_nuptk',
            'pangkat_gol_jabatan' => 'nullable|string|max:255',
            'tugas_tambahan' => 'nullable|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip_nuptk.required' => 'NIP/NUPTK guru wajib diisi.',
            'nip_nuptk.unique' => 'NIP/NUPTK sudah ada.',
            'gender_id.required' => 'Gender guru wajib diisi.',
            'gender_id.exists' => 'Gender guru tidak valid.',
            'agama_id.required' => 'Agama guru wajib diisi.',
            'agama_id.exists' => 'Agama guru tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotoguru', 'public');
        }

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
            'nip_nuptk' => 'required|string|max:255|unique:gurus,nip_nuptk,' . $guru->id,
            'pangkat_gol_jabatan' => 'nullable|string|max:255',
            'tugas_tambahan' => 'nullable|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip_nuptk.required' => 'NIP/NUPTK guru wajib diisi.',
            'nip_nuptk.unique' => 'NIP/NUPTK sudah ada.',
            'gender_id.required' => 'Gender guru wajib diisi.',
            'gender_id.exists' => 'Gender guru tidak valid.',
            'agama_id.required' => 'Agama guru wajib diisi.',
            'agama_id.exists' => 'Agama guru tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Upload atau update foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotoguru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('guru.index')->with('success', 'Guru telah diperbarui');
    }


    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru telah dihapus');
    }
}
