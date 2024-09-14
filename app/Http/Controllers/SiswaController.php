<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Gender;
use App\Models\Agama;
use App\Models\jurusan;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


    public function profile()
    {
        $user = Auth::user();
        $siswa = Siswa::where('id', $user->siswa_id)->firstOrFail();
    
        $totalPelanggaran = $siswa->bukuPelanggarans()->count();
        $totalPoin = $siswa->bukuPelanggarans()->sum('buku_pelanggarans.poin');
    
        return view('components.siswa-profile.profile', compact('siswa', 'totalPelanggaran', 'totalPoin'));
    }


    
    public function profileEdit(Siswa $id)
    {
        $user = Auth::user();
        $siswa = Siswa::where('id', $user->siswa_id)->firstOrFail();

        // $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $gender = Gender::all();
        $agama = Agama::all();

        return view('components.siswa-profile.edit', compact('siswa', 'kelas', 'jurusan', 'gender', 'agama'));
    }

    public function profileUpdate(Request $request, Siswa $siswa)
    {
        $user = Auth::user();
        $siswa = Siswa::where('id', $user->siswa_id)->firstOrFail();
        
        $validated = $request->validate([
            'nis_nisn' => 'required|string|max:255|unique:siswas,nis_nisn,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'status_dalam_keluarga' => 'nullable|in:Anak kandung,Anak angkat,Tinggal bersama wali',
            'status_parental' => 'nullable|in:Lengkap,Yatim,Piatu,Yatim piatu', 
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nis_nisn.required' => 'NIS/NISN siswa wajib diisi.',
            'nis_nisn.unique' => 'NIS/NISN sudah ada.',
            'jurusan_id.required' => 'Jurusan siswa wajib diisi.',
            'jurusan_id.exists' => 'Jurusan siswa tidak valid.',
            'kelas_id.required' => 'Kelas siswa wajib diisi.',
            'kelas_id.exists' => 'Kelas siswa tidak valid.',
            'gender_id.required' => 'Gender siswa wajib diisi.',
            'gender_id.exists' => 'Gender siswa tidak valid.',
            'agama_id.required' => 'Agama siswa wajib diisi.',
            'agama_id.exists' => 'Agama siswa tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Upload atau update foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotosiswa', 'public');
        }

        $siswa->update($validated);
    
        return redirect()->route('siswa.profile')->with('success', 'Data siswa telah diperbarui');
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
            'nis_nisn' => 'required|unique:siswas,nis_nisn',
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'status_dalam_keluarga' => 'nullable|in:Anak kandung,Anak angkat,Tinggal bersama wali',
            'status_parental' => 'nullable|in:lengkap,yatim,piatu,yatim piatu',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nis_nisn.required' => 'NIS/NISN siswa wajib diisi.',
            'nis_nisn.unique' => 'NIS/NISN sudah ada.',
            'jurusan_id.required' => 'Jurusan siswa wajib diisi.',
            'jurusan_id.exists' => 'Jurusan siswa tidak valid.',
            'kelas_id.required' => 'Kelas siswa wajib diisi.',
            'kelas_id.exists' => 'Kelas siswa tidak valid.',
            'gender_id.required' => 'Gender siswa wajib diisi.',
            'gender_id.exists' => 'Gender siswa tidak valid.',
            'agama_id.required' => 'Agama siswa wajib diisi.',
            'agama_id.exists' => 'Agama siswa tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotosiswa', 'public');
        }

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
            'nis_nisn' => 'required|string|max:255|unique:siswas,nis_nisn,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'gender_id' => 'required|exists:genders,id',
            'agama_id' => 'required|exists:agamas,id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'status_dalam_keluarga' => 'nullable|in:Anak kandung,Anak angkat,Tinggal bersama wali',
            'status_parental' => 'nullable|in:lengkap,yatim,piatu,yatim piatu', 
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nis_nisn.required' => 'NIS/NISN siswa wajib diisi.',
            'nis_nisn.unique' => 'NIS/NISN sudah ada.',
            'jurusan_id.required' => 'Jurusan siswa wajib diisi.',
            'jurusan_id.exists' => 'Jurusan siswa tidak valid.',
            'kelas_id.required' => 'Kelas siswa wajib diisi.',
            'kelas_id.exists' => 'Kelas siswa tidak valid.',
            'gender_id.required' => 'Gender siswa wajib diisi.',
            'gender_id.exists' => 'Gender siswa tidak valid.',
            'agama_id.required' => 'Agama siswa wajib diisi.',
            'agama_id.exists' => 'Agama siswa tidak valid.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, png, atau jpeg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Upload atau update foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotosiswa', 'public');
        }

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data siswa telah diperbarui.');
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa telah dihapus.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
    
        try {
            Excel::import(new SiswaImport, $request->file('file'));
            return redirect()->route('siswa.index')->with('success', 'Data siswa telah diimport.');
        } catch (\Exception $e) {
            return redirect()->route('siswa.index')->with('error', 'Terjadi kesalahan saat mengimport data: ' . $e->getMessage());
        }
    }
    

    public function downloadTemplate()
    {
        $file = public_path('templates/Template_Input_Siswa.xlsx');
        return response()->download($file);
    }
}
