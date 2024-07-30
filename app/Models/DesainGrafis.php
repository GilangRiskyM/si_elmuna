<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesainGrafis extends Model
{
    use HasFactory;

    protected $table = "daftar_desain_grafis";

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'nama_ayah',
        'nama_ibu',
        'telepon',
        'email',
        'kecamatan',
        'paket',
    ];
}
