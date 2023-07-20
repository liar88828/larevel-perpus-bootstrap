<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authtenticates', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('email');
            $table->string('tanggalLahir');
            $table->string('noHp');
            $table->string('jabatan');
            $table->string('divisi');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authtenticates');
    }
};