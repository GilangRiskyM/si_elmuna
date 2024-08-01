<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMengemudiRequest;
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

        return view('admin.mengemudi.mengemudi', ['data' => $data]);
    }

    function edit($id)
    {
        $data = Mengemudi::where('id', $id)->get();

        return view('admin.mengemudi.edit-mengemudi', ['data' => $data]);
    }

    function update(EditMengemudiRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Mengemudi::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_mengemudi');
    }

    function delete($id)
    {
        $data = Mengemudi::findOrFail($id);

        return view('admin.mengemudi.hapus-mengemudi', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = Mengemudi::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_mengemudi');
    }
}
