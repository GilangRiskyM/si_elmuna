<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesainGrafisController extends Controller
{
    function create()
    {
        return view('pendaftaran.desain_grafis');
    }
}
