<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MengemudiController extends Controller
{
    function index()
    {
        return view('pendaftaran.mengemudi');
    }
}
