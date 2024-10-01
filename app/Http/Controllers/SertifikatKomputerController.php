<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use App\Models\SertifikatKomputer;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatKomputerController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatKomputer::orderBy('id', 'desc')
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
            $data = SertifikatKomputer::latest()->get();
        }

        return view('admin.sertifikat.komputer.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = Komputer::findOrFail($id);

        return view('admin.sertifikat.komputer.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        $sql = SertifikatKomputer::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/komputer');
    }

    function edit($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatKomputer::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/komputer');
    }

    function delete($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/komputer');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatKomputer::findOrFail($id);
        return view('admin.sertifikat.komputer.cetak-nilai', ['data' => $sql]);
    }
}
