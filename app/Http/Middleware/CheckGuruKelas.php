<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;

class CheckGuruKelas
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Pastikan user adalah guru
        if (!$user || !$user->guru) {
            return redirect()->back()->withErrors(['permission' => 'Anda tidak memiliki izin sebagai guru.']);
        }

        $guruId = $user->guru->id; // Ambil ID guru dari tabel Guru
        $kelasId = $request->input('kelas_id');

        // Cek apakah kelas valid dan apakah guru adalah wali kelas
        $kelas = Kelas::find($kelasId);
        if (!$kelas || $kelas->guru_id != $guruId) {
            return redirect()->back()->withErrors(['kelas_id' => 'Anda tidak memiliki izin untuk mengelola pelanggaran di kelas ini.']);
        }

        return $next($request);
    }
}
