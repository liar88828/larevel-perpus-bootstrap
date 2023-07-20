<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authtenticate extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenisKelamin',
        'email',
        'tanggalLahir',
        'noHp',
        'jabatan',
        'divisi',
        'password',
    ];
}