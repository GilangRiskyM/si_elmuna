<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keluar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'keluar';

    protected $fillable = [
        'ket_pengeluaran',
        'jumlah_pengeluaran'
    ];
}
