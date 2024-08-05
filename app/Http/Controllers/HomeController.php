<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('dashboard.index');
    }

    function adminDashboard()
    {
        return view('admin.index');
    }
}
