<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelIjinLembur extends Model
{
    use HasFactory;
    protected $fillable=[
        'kepada',
        'hal',
        'nama',
        'jabatan',
        'divisi',
        'no',
        'hari_tanggal',
        'jam_kerja_normal',
        'jam_kerja_lembur',
        'guna',
        'nama_divisi',
        'jabatan_divisi',
        'nama_penyetujui',
        'jabatan_penyetujui',



    ]
}
