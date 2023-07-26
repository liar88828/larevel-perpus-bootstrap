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
            // $table->string(column: 'user_id');
            $table->string('jenis');
            $table->string('keterangan');
            $table->string('jam_kerja');
            $table->string('jam_lembur');
            $table->string('lama');
            $table->string('acc_divisi');
            $table->string('acc_direktur');
            $table->string('lampiran');
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
