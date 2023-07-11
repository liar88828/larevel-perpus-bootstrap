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
        Schema::create('model_ijin_lemburs', function (Blueprint $table) {
            $table->id();
            $table->string('kepada');   // kepada staff HRD 
            $table->string('hal');      // permohonan lemburs karyawan
            $table->string('nama');     // Bayu
            $table->string('jabatan');  // mahasiswa 'manajer IT'
            $table->string('divisi');   // IT 'merupakan bidang '

            $table->string('no');   // urutan apsen
            $table->string('hari_tanggal');   // hari kegiatn
            $table->string('jam_kerja_normal');   // jam mulai kerja
            $table->string('jam_kerja_lembur');   //  jam terakhir
            $table->string('guna');   // keterangan

            $table->string('nama_divisi');   // IT nama orang sesuai devisi
            $table->string('jabatan_divisi');   // jabatan sesuai bidang

            $table->string('nama_penyetujui');   // IT nama orang sesuai devisi
            $table->string('jabatan_penyetujui');   // jabatan sesuai bidang
            
            
            
            
            $table->timestamps();

        });
    }


   // Pemohon	Nama	Jabatan	Mengetahui	Nama	Jabatan	Menyetujui	Nama	Jabatan



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_ijin_lemburs');
    }
};
