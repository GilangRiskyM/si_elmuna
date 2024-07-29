<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesainGrafisController extends Controller
{
    function index()
    {
        return view('pendaftaran.desain_grafis');
    }
}
