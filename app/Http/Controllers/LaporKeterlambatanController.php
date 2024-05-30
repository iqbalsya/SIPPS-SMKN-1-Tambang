<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\BukuPelanggaran;
use App\Models\Kelas;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class LaporKeterlambatanController extends Controller
{
    public function index()
    {
        $pelanggaranTerlambat = BukuPelanggaran::whereHas('pelanggaran', function ($query) {
            $query->where('deskripsi', 'Terlambat datang ke sekolah');
        })
        ->orderBy('hari_tanggal', 'desc')
        ->with(['siswa.kelas', 'siswa.gender', 'guru'])
        ->get();

        return view('components.lapor-keterlambatan.index', compact('pelanggaranTerlambat'));
    }

    public function create()
    {
        $pelanggaran = Pelanggaran::where('deskripsi', 'Terlambat Datang ke Sekolah')->first();
        $tipePelanggaran = $pelanggaran->tipePelanggaran;
        $gurus = Guru::all();
        $kelas = Kelas::all();

        return view('components.lapor-keterlambatan.create', compact('pelanggaran', 'tipePelanggaran', 'gurus', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'siswa_id' => 'required',
            'guru_id' => 'required',
            'hari_tanggal' => 'required',
            'alasan' => 'required',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($request->pelanggaran_id);
        $poin = $pelanggaran->poin;

        BukuPelanggaran::create([
            'kelas_id' => $request->kelas_id,
            'siswa_id' => $request->siswa_id,
            'tipe_pelanggaran_id' => $request->tipe_pelanggaran_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'guru_id' => $request->guru_id,
            'hari_tanggal' => $request->hari_tanggal,
            'alasan' => $request->alasan,
            'poin' => $poin,
        ]);

        return redirect()->route('lapor-keterlambatan.index')->with('success', 'Laporan keterlambatan berhasil disimpan.');
    }

    public function cetakSurat($id)
    {
        // Ambil data laporan keterlambatan berdasarkan ID
        $laporan = BukuPelanggaran::with('siswa.kelas', 'siswa.gender', 'guru')->findOrFail($id);

        // Buat instance TemplateProcessor dan muat template surat
        $templateProcessor = new TemplateProcessor(storage_path('app/surat_izin.docx'));

        // Isi template dengan data dari database
        $templateProcessor->setValue('NAMA_SISWA', $laporan->siswa->nama);
        $templateProcessor->setValue('KELAS', $laporan->siswa->kelas->nama);
        $templateProcessor->setValue('JENIS_KELAMIN', $laporan->siswa->gender->jenis);
        $templateProcessor->setValue('ALASAN', $laporan->alasan);
        $templateProcessor->setValue('TANGGAL', $laporan->formatted_tanggal);
        $templateProcessor->setValue('GURU_PIKET', $laporan->guru->nama);

        // Simpan dokumen ke file temporer
        $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord');
        $templateProcessor->saveAs($tempFile);

        // Format nama file: surat_izin_nama_siswa_tanggal.docx
        $namaSiswa = str_replace(' ', '_', $laporan->siswa->nama);
        $tanggal = \Carbon\Carbon::parse($laporan->hari_tanggal)->format('d_m_Y');
        $namaFile = "Surat Izin Masuk Kelas_{$namaSiswa}_{$tanggal}.docx";

        // Return file sebagai response download dengan nama yang diformat
        return response()->download($tempFile, $namaFile)->deleteFileAfterSend(true);
    }

}
