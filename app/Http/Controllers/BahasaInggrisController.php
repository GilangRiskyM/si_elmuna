<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBahasaInggrisRequest;
use App\Http\Requests\TambahBahasaInggrisRequest;
use App\Models\BahasaInggris;
use Illuminate\Support\Facades\Session;

class BahasaInggrisController extends Controller
{
    function create()
    {
        return view('pendaftaran.bahasa_inggris');
    }


    function store(TambahBahasaInggrisRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = BahasaInggris::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_bahasa_inggris');
    }

    function index()
    {
        $data = BahasaInggris::get();

        return view('admin.bahasa_inggris.bahasa_inggris', ['data' => $data]);
    }

    function edit($id)
    {
        $data = BahasaInggris::where('id', $id)->get();

        return view('admin.bahasa_inggris.edit-bahasa_inggris', ['data' => $data]);
    }

    function update(EditBahasaInggrisRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = BahasaInggris::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_bahasa_inggris');
    }

    function delete($id)
    {
        $data = BahasaInggris::findOrFail($id);

        return view('admin.bahasa_inggris.hapus-bahasa_inggris', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = BahasaInggris::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_bahasa_inggris');
    }

    function deletedBahasaInggris()
    {
        $data = BahasaInggris::onlyTrashed()->get();

        return view('admin.bahasa_inggris.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = BahasaInggris::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_bahasa_inggris');
    }

    function deletePermanen($id)
    {
        $data = BahasaInggris::withTrashed()
            ->findOrFail($id);

        return view('admin.bahasa_inggris.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = BahasaInggris::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_bahasa_inggris/terhapus');
    }
}
