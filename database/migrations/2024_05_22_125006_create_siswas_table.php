<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('agama_id');
            $table->string('nama', 255);
            $table->string('nis_nisn', 255)->unique();
            $table->string('tempat_lahir', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('telepon', 255)->nullable();
            $table->enum('status_dalam_keluarga', ['Anak kandung', 'Anak angkat', 'Tinggal bersama wali'])->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('nama_ayah', 255)->nullable();
            $table->string('nama_ibu', 255)->nullable();
            $table->string('alamat_orang_tua', 255)->nullable();
            $table->string('telepon_orang_tua', 255)->nullable();
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
