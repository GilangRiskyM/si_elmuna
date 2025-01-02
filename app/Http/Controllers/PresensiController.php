<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PresensiController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = Presensi::orderBy('id', 'desc')
                ->where('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $data = Presensi::orderBy('id', 'desc')->get();
        }
        return view('admin.presensi.index', [
            'data' => $data
        ]);
    }

    function scan($id)
    {
        $sql = Karyawan::findOrFail($id);

        $data = [
            'nama' => $sql->nama,
            'jabatan' => $sql->jabatan,
            'waktu_presensi' => now(),
            'status' => 'hadir'
        ];

        $presensi = Presensi::create($data);

        if ($presensi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Presensi berhasil!');
        }

        return redirect('/presensi');
    }

    function destroy($id)
    {
        $delete = Presensi::findOrFail($id)->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus!');
        }

        return redirect('/presensi');
    }
}
