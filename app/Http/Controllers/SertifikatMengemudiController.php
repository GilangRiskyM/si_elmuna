<?php

namespace App\Http\Controllers;

use App\Models\Mengemudi;
use Illuminate\Http\Request;
use App\Models\SertifikatMengemudi;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatMengemudiController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatMengemudi::orderBy('id', 'desc')
                ->where('no_sertifikat', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('tempat_lahir', 'LIKE', '%' . $cari . '%')
                ->orWhere('nis', 'LIKE', '%' . $cari . '%')
                ->orWhere('program', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel1', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel2', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel3', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel4', 'LIKE', '%' . $cari . '%')
                ->orWhere('mapel5', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai1', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai2', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai3', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai4', 'LIKE', '%' . $cari . '%')
                ->orWhere('nilai5', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $data = SertifikatMengemudi::latest()->get();
        }

        return view('admin.sertifikat.mengemudi.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = Mengemudi::findOrFail($id);

        return view('admin.sertifikat.mengemudi.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        $sql = SertifikatMengemudi::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/mengemudi');
    }

    function edit($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatMengemudi::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/mengemudi');
    }

    function delete($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/mengemudi');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatMengemudi::findOrFail($id);
        return view('admin.sertifikat.mengemudi.cetak-nilai', ['data' => $sql]);
    }
}
