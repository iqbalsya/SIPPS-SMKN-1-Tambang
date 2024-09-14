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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('nip_nuptk', 255)->unique();
            $table->string('pangkat_gol_jabatan', 255)->nullable();
            $table->string('tugas_tambahan', 255)->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('agama_id');
            $table->string('tempat_lahir', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('telepon', 255)->nullable();
            $table->string('foto', 255)->nullable(); 
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
