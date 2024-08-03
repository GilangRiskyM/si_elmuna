<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditVideoFotoRequest;
use App\Http\Requests\TambahVideoFotoRequest;
use App\Models\VideoFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoFotoController extends Controller
{
    function create()
    {
        return view('pendaftaran.video_editing_fotografi');
    }

    function store(TambahVideoFotoRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = VideoFoto::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_video_editing_fotografi');
    }

    function index()
    {
        $data = VideoFoto::get();

        return view('admin.video_editing_fotografi.video_editing_fotografi', ['data' => $data]);
    }

    function edit($id)
    {
        $data = VideoFoto::where('id', $id)->get();

        return view('admin.video_editing_fotografi.edit-video_editing_fotografi', ['data' => $data]);
    }

    function update(EditVideoFotoRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = VideoFoto::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_video_editing_fotografi');
    }

    function delete($id)
    {
        $data = VideoFoto::findOrFail($id);

        return view('admin.video_editing_fotografi.hapus-video_editing_fotografi', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = VideoFoto::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_video_editing_fotografi');
    }

    function deletedVideoFoto()
    {
        $data = VideoFoto::onlyTrashed()->get();

        return view('admin.video_editing_fotografi.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = VideoFoto::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_video_editing_fotografi');
    }

    function deletePermanen($id)
    {
        $data = VideoFoto::withTrashed()
            ->findOrFail($id);

        return view('admin.video_editing_fotografi.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = VideoFoto::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_video_editing_fotografi/terhapus');
    }
}
