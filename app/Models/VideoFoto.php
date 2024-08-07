<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoFoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'daftar_videoediting_dan_fotografi';

    protected $fillable = [
        'nik',
        'nisn',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'alamat',
        'kecamatan',
        'kabupaten',
        'agama',
        'status',
        'nama_ibu',
        'nama_ayah',
        'telepon',
        'email',
        'paket'

    ];
}
