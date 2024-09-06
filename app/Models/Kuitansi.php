<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    use HasFactory;

    protected $table = 'kuitansi';

    protected $fillable = [
        'nama',
        'guna_byr1',
        'guna_byr2',
        'guna_byr3',
        'jumlah',
        'terbilang',
        'penerima'
    ];
}
