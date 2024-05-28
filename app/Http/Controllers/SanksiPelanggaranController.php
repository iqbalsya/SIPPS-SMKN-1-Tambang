<?php

namespace App\Http\Controllers;

use App\Models\SanksiPelanggaran;
use Illuminate\Http\Request;

class SanksiPelanggaranController extends Controller
{
    public function index()
    {
        $sanksiPelanggarans = SanksiPelanggaran::all();
        return view('components.sanksi-pelanggaran.index', compact('sanksiPelanggarans'));
    }

    public function create()
    {
        return view('components.sanksi-pelanggaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'akumulasi_poin' => 'required|integer',
        ], [
            'nama.required' => 'Nama sanksi pelanggaran wajib diisi.',
            'akumulasi_poin.required' => 'Akumulasi poin wajib diisi.',
        ]);

        SanksiPelanggaran::create($validated);

        return redirect()->route('sanksi-pelanggaran.index')->with('success', 'Sanksi pelanggaran telah ditambahkan.');
    }

    public function edit($id)
    {
        $sanksiPelanggaran = SanksiPelanggaran::findOrFail($id);
        return view('components.sanksi-pelanggaran.edit', compact('sanksiPelanggaran'));
    }

    public function update(Request $request, SanksiPelanggaran $sanksiPelanggaran)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'akumulasi_poin' => 'required|integer',
        ], [
            'nama.required' => 'Nama sanksi pelanggaran wajib diisi.',
            'akumulasi_poin.required' => 'Akumulasi poin wajib diisi.',
        ]);

        $sanksiPelanggaran->update($validated);

        return redirect()->route('sanksi-pelanggaran.index')->with('success', 'Sanksi pelanggaran telah diperbarui.');
    }

    public function destroy(SanksiPelanggaran $sanksiPelanggaran)
    {
        $sanksiPelanggaran->delete();
        return redirect()->route('sanksi-pelanggaran.index')->with('success', 'Sanksi pelanggaran telah dihapus.');
    }
}
