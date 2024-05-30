<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuPelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('tipe_pelanggaran_id')->constrained('tipe_pelanggarans');
            $table->foreignId('pelanggaran_id')->constrained('pelanggarans');
            $table->foreignId('guru_id')->constrained('gurus');
            $table->integer('poin');
            $table->date('hari_tanggal');
            $table->string('alasan');
            $table->timestamps();

            $table->unique(['siswa_id', 'kelas_id', 'tipe_pelanggaran_id', 'pelanggaran_id', 'guru_id', 'hari_tanggal'], 'buku_pelanggaran_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_pelanggarans');
    }
}
