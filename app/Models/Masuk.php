<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masuk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'masuk';

    protected $fillable = [
        'ket_pemasukan',
        'jumlah_pemasukan'
    ];
}
