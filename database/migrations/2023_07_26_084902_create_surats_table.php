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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('hari_tanggal');
            $table->string('keterangan');
            $table->string('hari_kerja');
            $table->string('mulai_pagi') ;
            $table->string('akhir_pagi') ;
            $table->string('mulai_malam') ;
            $table->string('akhir_malam') ;
            $table->string('acc_divisi');
            $table->string('nama_manager');
            //realsional
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
