<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\TipePelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = Pelanggaran::with('tipePelanggaran')->get();
        return view('components.pelanggaran.index', compact('pelanggaran'));
    }

    public function show($pelanggaran_id)
    {
        // Mengambil data pelanggaran dengan pengurutan berdasarkan tanggal terbaru
        $pelanggaran = Pelanggaran::with(['bukuPelanggarans' => function ($query) {
            $query->orderBy('hari_tanggal', 'desc');
        }])->findOrFail($pelanggaran_id);

        return view('components.pelanggaran.pelanggaran', compact('pelanggaran'));
    }

    public function create()
    {
        $tipePelanggaran = TipePelanggaran::all();
        return view('components.pelanggaran.create', compact('tipePelanggaran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'poin' => 'required|integer',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
        ], [
            'deskripsi.required' => 'Deskripsi pelanggaran wajib diisi.',
            'poin.required' => 'Poin pelanggaran wajib diisi.',
            'tipe_pelanggaran_id.required' => 'Tipe pelanggaran wajib diisi.',
            'tipe_pelanggaran_id.exists' => 'Tipe pelanggaran tidak valid.',
        ]);

        Pelanggaran::create($validated);

        return redirect()->route('pelanggaran.index')->with('success', 'Pelanggaran telah ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $tipePelanggaran = TipePelanggaran::all();
        return view('components.pelanggaran.edit', compact('pelanggaran', 'tipePelanggaran'));
    }

    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'poin' => 'required|integer',
            'tipe_pelanggaran_id' => 'required|exists:tipe_pelanggarans,id',
        ], [
            'deskripsi.required' => 'Deskripsi pelanggaran wajib diisi.',
            'poin.required' => 'poin pelanggaran wajib diisi.',
            'tipe_pelanggaran_id.required' => 'Tipe pelanggaran wajib diisi.',
            'tipe_pelanggaran_id.exists' => 'Tipe pelanggaran tidak valid.',
        ]);

        $pelanggaran->update($validated);

        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran telah diperbarui.');
    }

    public function destroy(Pelanggaran $pelanggaran)
    {
        $pelanggaran->delete();
        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran telah dihapus.');
    }
}

