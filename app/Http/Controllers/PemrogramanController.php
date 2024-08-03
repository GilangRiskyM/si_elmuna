<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPemrogramanRequest;
use App\Http\Requests\TambahPemrogramanRequest;
use App\Models\Pemrograman;
use Illuminate\Support\Facades\Session;

class PemrogramanController extends Controller
{
    function create()
    {
        return view('pendaftaran.pemrograman');
    }

    function store(TambahPemrogramanRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Pemrograman::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_pemrograman');
    }

    function index()
    {
        $data = Pemrograman::get();

        return view('admin.pemrograman.pemrograman', ['data' => $data]);
    }

    function edit($id)
    {
        $data = Pemrograman::where('id', $id)->get();

        return view('admin.pemrograman.edit-pemrograman', ['data' => $data]);
    }

    function update(EditPemrogramanRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Pemrograman::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function delete($id)
    {
        $data = Pemrograman::findOrFail($id);

        return view('admin.pemrograman.hapus-pemrograman', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = Pemrograman::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function deletedPemrograman()
    {
        $data = Pemrograman::onlyTrashed()->get();

        return view('admin.pemrograman.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = Pemrograman::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function deletePermanen($id)
    {
        $data = Pemrograman::withTrashed()
            ->findOrFail($id);

        return view('admin.pemrograman.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = Pemrograman::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_pemrograman/terhapus');
    }
}
