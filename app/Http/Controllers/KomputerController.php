<?php

namespace App\Http\Controllers;

use App\Http\Requests\TambahKomputerRequest;
use App\Http\Requests\EditKomputerRequest;
use App\Models\Komputer;
use Illuminate\Support\Facades\Session;

class KomputerController extends Controller
{
    function create()
    {
        return view('pendaftaran.komputer');
    }

    function store(TambahKomputerRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Komputer::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_komputer');
    }

    function index()
    {
        $data = Komputer::get();

        return view('admin.komputer.komputer', ['data' => $data]);
    }

    function edit($id)
    {
        $data = Komputer::where('id', $id)->get();

        return view('admin.komputer.edit-komputer', ['data' => $data]);
    }

    function update(EditKomputerRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Komputer::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_komputer');
    }

    function delete($id)
    {
        $data = Komputer::findOrFail($id);

        return view('admin.komputer.hapus-komputer', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = Komputer::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_komputer');
    }

    function deletedKomputer()
    {
        $data = Komputer::onlyTrashed()->get();

        return view('admin.komputer.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = Komputer::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_komputer');
    }

    function deletePermanen($id)
    {
        $data = Komputer::withTrashed()
            ->findOrFail($id);

        return view('admin.komputer.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = Komputer::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_komputer/terhapus');
    }
}
