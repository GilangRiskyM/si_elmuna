<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahMengemudiRequest;
use App\Models\Mengemudi;
use Illuminate\Support\Facades\Session;

class MengemudiController extends Controller
{
    function create()
    {
        return view('pendaftaran.mengemudi');
    }

    function store(TambahMengemudiRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Mengemudi::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_mengemudi');
    }

    function index()
    {
        $data = Mengemudi::get();

        return view('admin.mengemudi', ['data' => $data]);
    }

    function edit($id)
    {
        $data = Mengemudi::where('id', $id)->get();

        return view('admin.edit-mengemudi', ['data' => $data]);
    }
}
