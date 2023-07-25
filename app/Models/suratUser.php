<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratUser extends Model
{
    use HasFactory;

    protected $fillable=[
        'jenis',
        'keterangan',
        'jam_kerja',
        'jam_lebur',
        'lama',
        'acc_divisi',
        'acc_direktur',
        'lampiran',
        'status'
    ];

}
