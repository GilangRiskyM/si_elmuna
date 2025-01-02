<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditKaryawanRequest;
use App\Http\Requests\TambahKaryawanRequest;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KaryawanController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = Karyawan::orderBy('id', 'desc')
                ->where('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $data = Karyawan::orderBy('id', 'desc')->get();
        }

        return view('admin.karyawan.index', [
            'data' => $data
        ]);
    }

    function create()
    {
        return view('admin.karyawan.tambah');
    }

    function store(TambahKaryawanRequest $request)
    {
        $request->validated();
        $tambah = Karyawan::create($request->all());
        if ($tambah) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan!');
        }
        return redirect('/karyawan');
    }

    function qrCode($id)
    {
        $sql = Karyawan::findOrFail($id);
        $urlQrCode = url('/scan/' . $sql->id);
        $qrCode = QrCode::size(200)
            ->errorCorrection('H')
            ->generate($urlQrCode);
        return view('admin.karyawan.qr', [
            'data' => $sql,
            'qrCode' => $qrCode
        ]);
    }

    function edit($id)
    {
        $sql = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', [
            'data' => $sql
        ]);
    }

    function update(EditKaryawanRequest $request, $id)
    {
        $sql = Karyawan::findOrFail($id);
        $request->validated();
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil diubah!');
        }
        return redirect('/karyawan');
    }

    function delete($id)
    {
        $data = Karyawan::findOrFail($id);
        return view('admin.karyawan.hapus', [
            'data' => $data
        ]);
    }

    function destroy($id)
    {
        $sql = Karyawan::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }
        return redirect('/karyawan');
    }
}
