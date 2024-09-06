<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditKuitansiRequest;
use App\Http\Requests\TambahKuitansiRequest;
use App\Models\Masuk;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KuitansiController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $sql = Kuitansi::latest()
                ->where('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('guna_byr1', 'LIKE', '%' . $cari . '%')
                ->orWhere('guna_byr2', 'LIKE', '%' . $cari . '%')
                ->orWhere('guna_byr3', 'LIKE', '%' . $cari . '%')
                ->orWhere('jumlah', 'LIKE', '%' . $cari . '%')
                ->orWhere('terbilang', 'LIKE', '%' . $cari . '%')
                ->orWhere('penerima', 'LIKE', '%' . $cari . '%')
                ->paginate(20)
                ->onEachSide(2);
        } else {
            $sql = Kuitansi::latest()->paginate(20)->onEachSide(2);
        }

        return view('admin.kuitansi.index', [
            'data' => $sql,
        ]);
    }

    function create($id)
    {
        $sql = Masuk::findOrFail($id);
        return view('admin.kuitansi.tambah', ['data' => $sql]);
    }

    function store(TambahKuitansiRequest $request)
    {
        $request->validated();
        $sql = Kuitansi::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Kuitansi Berhasil!!!');
        }

        return redirect('/kuitansi');
    }

    function edit($id)
    {
        $sql = Kuitansi::findOrFail($id);
        return view('admin.kuitansi.edit', ['data' => $sql]);
    }

    function update(EditKuitansiRequest $request, $id)
    {
        $request->validated();
        $sql = Kuitansi::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Kuitansi Berhasil!!!');
        }

        return redirect('/kuitansi');
    }

    function cetakKuitansi($id)
    {
        $sql = Kuitansi::findOrFail($id);
        return view('admin.kuitansi.cetak', ['data' => $sql]);
    }

    function delete($id)
    {
        $sql = Kuitansi::findOrFail($id);
        return view('admin.kuitansi.hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = Kuitansi::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Kuitansi Berhasil!!!');
        }

        return redirect('/kuitansi');
    }
}
