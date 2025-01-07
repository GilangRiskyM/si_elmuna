<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Karyawan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    function filterData(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $data = Presensi::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

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
            'status' => 'Hadir'
        ];

        $presensi = Presensi::create($data);

        if ($presensi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Presensi berhasil!');
        }

        return redirect('/presensi');
    }

    function create()
    {
        $karyawan = Karyawan::get();
        return view('admin.presensi.tambah', [
            'karyawans' => $karyawan
        ]);
    }

    function getDataKaryawan(Request $request)
    {
        $id = $request->input('id');
        $karyawan = Karyawan::find($id);
        return response()->json($karyawan);
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi!',
            'jabatan.required' => 'Jabatan wajib diisi!',
            'status.required' => 'Status wajib diisi!'
        ]);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'waktu_presensi' => now(),
            'status' => $request->status
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

    function export(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $sql = Presensi::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Jabatan');
        $sheet->setCellValue('D1', 'Waktu Presensi');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'Tanggal');

        $no = 1;
        $rows = 2;

        $namaFile = "Laporan Presensi Karyawan " . date($start_date) . " sampai " . date($end_date) . ".xlsx";

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->nama);
            $sheet->setCellValue('C' . $rows, $data->jabatan);
            $sheet->setCellValue('D' . $rows, date('H:i', strtotime($data->waktu_presensi)) . " WIB");
            $sheet->setCellValue('E' . $rows, $data->status);

            $tgl = new DateTime($data->created_at);
            $tanggal = date_format($tgl, 'd/m/Y');
            $sheet->setCellValue('F' . $rows, $tanggal);

            $rows++;
        }

        $writer  = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $namaFile . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
