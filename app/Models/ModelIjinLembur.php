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
        'divisi',
        'no',
        'hari_tanggal',
        'jam_kerja_normal',
        'jam_kerja_lembur',
        'guna',
        'nama_divisi',
        'nama_penyetujui',
    ];
}
