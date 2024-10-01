<?php

namespace App\Http\Controllers;

use App\Models\DesainGrafis;
use Illuminate\Http\Request;
use App\Models\SertifikatDesainGrafis;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatDesainGrafisController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatDesainGrafis::orderBy('id', 'desc')
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
            $data = SertifikatDesainGrafis::latest()->get();
        }

        return view('admin.sertifikat.desain_grafis.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = DesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        $sql = SertifikatDesainGrafis::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/desain-grafis');
    }

    function edit($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatDesainGrafis::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/desain-grafis');
    }

    function delete($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/desain-grafis');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatDesainGrafis::findOrFail($id);
        return view('admin.sertifikat.desain_grafis.cetak-nilai', ['data' => $sql]);
    }
}
