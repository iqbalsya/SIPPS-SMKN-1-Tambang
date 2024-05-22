<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('components.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $siswa = new Siswa();
        return view('components.siswa.create', compact('siswa'));
    }

    public function store(Request $request)
    {
          $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'gender' => 'required|string',
        ], [
            'nis.required' => 'NIS siswa wajib diisi.',
            'nis.unique' => 'NIS sudah ada.',
            'nama.required' => 'Nama siswa wajib diisi.',
            'kelas.required' => 'Kelas siswa wajib diisi.',
            'gender.required' => 'Gender siswa wajib diisi.',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('components.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|string',
            'kelas' => 'required',
            'gender' => 'required',
        ], [
            'nis.required' => 'NIS siswa wajib diisi.',
            'nis.unique' => 'NIS sudah ada.',
            'nama.required' => 'Nama siswa wajib diisi.',
            'kelas.required' => 'Kelas siswa wajib diisi.',
            'gender.required' => 'Gender siswa wajib diisi.',
        ]);

        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa telah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa telah berhasil dihapus.');
    }
}
