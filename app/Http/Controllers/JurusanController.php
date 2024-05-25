<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::with('guru')->get();
        return view('components.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('components.jurusan.create', [
            'title' => 'Tambah Jurusan',
            'gurus' => $gurus,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        Jurusan::create([
            'nama' => $request->nama,
            'guru_id' => $request->guru_id,
        ]);

        Session::flash('success', 'Jurusan berhasil ditambahkan.');

        return redirect()->route('.jurusan.index');
    }


    public function edit(Jurusan $jurusan)
    {
        $gurus = Guru::all();
        return view('components.jurusan.edit', compact('jurusan', 'gurus'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama' => 'required',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $jurusan->update([
            'nama' => $request->nama,
            'guru_id' => $request->guru_id,
        ]);

        Session::flash('success', 'Jurusan berhasil diperbarui.');

        return redirect()->route('jurusan.index');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        Session::flash('success', 'Jurusan berhasil dihapus.');

        return redirect()->route('jurusan.index');
    }

}

