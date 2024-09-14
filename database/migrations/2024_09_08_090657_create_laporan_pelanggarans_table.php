<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_pelanggarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('tipe_pelanggaran_id')->constrained('tipe_pelanggarans');
            $table->foreignId('pelanggaran_id')->constrained('pelanggarans');
            $table->foreignId('guru_id')->constrained('gurus');
            $table->date('hari_tanggal');
            $table->integer('poin');
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_pelanggarans');
    }
}
