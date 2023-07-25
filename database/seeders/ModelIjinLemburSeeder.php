<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelIjinLemburSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('model_ijin_lemburs')->insert([
            'kepada' => Str::random(10),
            'hal' => Str::random(10),
            'nama' => Str::random(10),
            'jabatan' => Str::random(10),
            'divisi' => Str::random(),
            'no' => Str::random(10),
            'hari_tanggal' => Str::random(10),
            'jam_kerja_normal' => Str::random(10),
            'jam_kerja_lembur' => Str::random(10),
            'guna' => Str::random(10),
            'nama_divisi' => Str::random(10),
            'jabatan_divisi' => Str::random(10),
            'nama_penyetujui' => Str::random(10),
            'jabatan_penyetujui' => Str::random(10),
        ]);
    }
}