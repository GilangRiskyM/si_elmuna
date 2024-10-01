<?php

namespace App\Http\Controllers;

use App\Models\Pemrograman;
use Illuminate\Http\Request;
use App\Models\SertifikatPemrograman;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatPemrogramanController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatPemrograman::orderBy('id', 'desc')
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
            $data = SertifikatPemrograman::latest()->get();
        }

        return view('admin.sertifikat.pemrograman.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = Pemrograman::findOrFail($id);

        return view('admin.sertifikat.pemrograman.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        $sql = SertifikatPemrograman::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/pemrograman');
    }

    function edit($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatPemrograman::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/pemrograman');
    }

    function delete($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/pemrograman');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatPemrograman::findOrFail($id);
        return view('admin.sertifikat.pemrograman.cetak-nilai', ['data' => $sql]);
    }
}
