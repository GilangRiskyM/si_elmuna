<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatDigitalMarketing extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_digital_marketing';

    protected $fillable = [
        'no_sertifikat',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nis',
        'program',
        'tgl_mulai',
        'tgl_selesai',
        'mapel1',
        'mapel2',
        'mapel3',
        'mapel4',
        'mapel5',
        'nilai1',
        'nilai2',
        'nilai3',
        'nilai4',
        'nilai5',
    ];
}
