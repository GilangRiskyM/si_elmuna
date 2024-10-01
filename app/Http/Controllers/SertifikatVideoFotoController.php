<?php

namespace App\Http\Controllers;

use App\Models\VideoFoto;
use Illuminate\Http\Request;
use App\Models\SertifikatVideoFoto;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditSertifikatRequest;
use App\Http\Requests\TambahSertifikatRequest;

class SertifikatVideoFotoController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = SertifikatVideoFoto::orderBy('id', 'desc')
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
            $data = SertifikatVideoFoto::latest()->get();
        }

        return view('admin.sertifikat.video_editing_fotografi.index', ['data' => $data]);
    }

    function create($id)
    {
        $sql = VideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.tambah', ['data' => $sql]);
    }

    function store(TambahSertifikatRequest $request)
    {
        $request->validated();
        $sql = SertifikatVideoFoto::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/video-editing-fotografi');
    }

    function edit($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.edit', ['data' => $sql]);
    }

    function update(EditSertifikatRequest $request, $id)
    {
        $request->validated();
        $sql = SertifikatVideoFoto::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/video-editing-fotografi');
    }

    function delete($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Sertifikat Berhasil!!!');
        }

        return redirect('/sertifikat/video-editing-fotografi');
    }

    function cetak_sertifikat($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.cetak-sertifikat', ['data' => $sql]);
    }

    function cetak_nilai($id)
    {
        $sql = SertifikatVideoFoto::findOrFail($id);
        return view('admin.sertifikat.video_editing_fotografi.cetak-nilai', ['data' => $sql]);
    }
}
