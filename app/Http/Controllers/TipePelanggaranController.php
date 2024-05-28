<?php

namespace App\Http\Controllers;

use App\Models\TipePelanggaran;
use Illuminate\Http\Request;

class TipePelanggaranController extends Controller
{
    public function index()
    {
        $tipePelanggarans = TipePelanggaran::all();
        return view('components.tipe-pelanggaran.index', compact('tipePelanggarans'));
    }

    public function create()
    {
        return view('components.tipe-pelanggaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama tipe pelanggaran wajib diisi.',
        ]);

        TipePelanggaran::create($validated);

        return redirect()->route('tipe-pelanggaran.index')->with('success', 'Tipe pelanggaran telah ditambahkan.');
    }

    public function edit($id)
    {
        $tipePelanggaran = TipePelanggaran::findOrFail($id);
        return view('components.tipe-pelanggaran.edit', compact('tipePelanggaran'));
    }

    public function update(Request $request, TipePelanggaran $tipePelanggaran)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama tipe pelanggaran wajib diisi.',
        ]);

        $tipePelanggaran->update($validated);

        return redirect()->route('tipe-pelanggaran.index')->with('success', 'Tipe pelanggaran telah diperbarui.');
    }

    public function destroy(TipePelanggaran $tipePelanggaran)
    {
        $tipePelanggaran->delete();
        return redirect()->route('tipe-pelanggaran.index')->with('success', 'Tipe pelanggaran telah dihapus.');
    }
}
