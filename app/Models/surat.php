<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;
    protected $fillable=[
        'jenis',
        'keterangan',
        'jam_kerja',
        'jam_lembur',
        'lama',
        'acc_divisi',
        'acc_direktur',
        'lampiran',
        'status'
    ];
}
