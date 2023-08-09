<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;
    protected $fillable=[
        'hari_tanggal',
        'keterangan',

        'hari_kerja',
        'mulai_pagi',
        'akhir_pagi',
        'mulai_malam',
        'akhir_malam',

        // 'lama',
        'acc_divisi',
        'acc_direktur',
        // 'lampiran',
        'status',
        'user_id'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
