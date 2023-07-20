<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenAccess extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'token',
        'expires'
    ];
}