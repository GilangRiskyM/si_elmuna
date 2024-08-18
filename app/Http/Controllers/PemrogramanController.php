<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPemrogramanRequest;
use App\Http\Requests\TambahPemrogramanRequest;
use App\Models\Pemrograman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PemrogramanController extends Controller
{
    function create()
    {
        return view('pendaftaran.pemrograman');
    }

    function store(TambahPemrogramanRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Pemrograman::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_pemrograman');
    }

    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = Pemrograman::orderBy('id', 'desc')
                ->where('nik', 'LIKE', '%' . $cari . '%')
                ->orWhere('nisn', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama', 'LIKE', '%' . $cari . '%')
                ->orWhere('tempat_lahir', 'LIKE', '%' . $cari . '%')
                ->orWhere('tanggal_lahir', 'LIKE', '%' . $cari . '%')
                ->orWhere('jk', 'LIKE', '%' . $cari . '%')
                ->orWhere('alamat', 'LIKE', '%' . $cari . '%')
                ->orWhere('kecamatan', 'LIKE', '%' . $cari . '%')
                ->orWhere('kabupaten', 'LIKE', '%' . $cari . '%')
                ->orWhere('agama', 'LIKE', '%' . $cari . '%')
                ->orWhere('status', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_ibu', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_ayah', 'LIKE', '%' . $cari . '%')
                ->orWhere('telepon', 'LIKE', '%' . $cari . '%')
                ->orWhere('email', 'LIKE', '%' . $cari . '%')
                ->orWhere('paket', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $data = Pemrograman::orderBy('id', 'desc')->get();
        }

        return view('admin.pemrograman.pemrograman', ['data' => $data]);
    }

    function filterData(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $data = Pemrograman::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('admin.pemrograman.pemrograman', ['data' => $data]);
    }

    function edit($id)
    {
        $data = Pemrograman::where('id', $id)->get();

        return view('admin.pemrograman.edit-pemrograman', ['data' => $data]);
    }

    function update(EditPemrogramanRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = Pemrograman::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function delete($id)
    {
        $data = Pemrograman::findOrFail($id);

        return view('admin.pemrograman.hapus-pemrograman', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = Pemrograman::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function deletedPemrograman()
    {
        $data = Pemrograman::onlyTrashed()->get();

        return view('admin.pemrograman.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = Pemrograman::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_pemrograman');
    }

    function deletePermanen($id)
    {
        $data = Pemrograman::withTrashed()
            ->findOrFail($id);

        return view('admin.pemrograman.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = Pemrograman::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_pemrograman/terhapus');
    }

    function export(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $sql = Pemrograman::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        $laki_laki = Pemrograman::where('jk', 'Laki-laki')->count();
        $perempuan = Pemrograman::where('jk', 'Perempuan')->count();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'NISN');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Tempat Lahir');
        $sheet->setCellValue('F1', 'Tanggal Lahir');
        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->setCellValue('H1', 'Alamat');
        $sheet->setCellValue('I1', 'Kecamatan');
        $sheet->setCellValue('J1', 'Kabupaten');
        $sheet->setCellValue('K1', 'Agama');
        $sheet->setCellValue('L1', 'Status Pekerjaan');
        $sheet->setCellValue('M1', 'Nama Ibu');
        $sheet->setCellValue('N1', 'Nama Ayah');
        $sheet->setCellValue('O1', 'No. WA');
        $sheet->setCellValue('P1', 'Email');
        $sheet->setCellValue('Q1', 'Tanggal Mendaftar');
        $sheet->setCellValue('R1', 'Paket');
        $sheet->setCellValue('S1', 'Jumlah Peserta Laki-laki');
        $sheet->setCellValue('T1', 'Jumlah Peserta Perempuan');

        $no = 1;
        $rows = 2;


        $filename = "Laporan Daftar Peserta Pemrograman " . date($start_date) . " sampai " . date($end_date) . ".xlsx";

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, "'" . $data->nik);
            $sheet->setCellValue('C' . $rows, $data->nisn);
            $sheet->setCellValue('D' . $rows, $data->nama);
            $sheet->setCellValue('E' . $rows, $data->tempat_lahir);
            $sheet->setCellValue('F' . $rows, $data->tanggal_lahir);
            $sheet->setCellValue('G' . $rows, $data->jk);
            $sheet->setCellValue('H' . $rows, $data->alamat);
            $sheet->setCellValue('I' . $rows, $data->kecamatan);
            $sheet->setCellValue('J' . $rows, $data->kabupaten);
            $sheet->setCellValue('K' . $rows, $data->agama);
            $sheet->setCellValue('L' . $rows, $data->status);
            $sheet->setCellValue('M' . $rows, $data->nama_ibu);
            $sheet->setCellValue('N' . $rows, $data->nama_ayah);
            $sheet->setCellValue('O' . $rows, $data->telepon);
            $sheet->setCellValue('P' . $rows, $data->email);
            $sheet->setCellValue('Q' . $rows, date_format($data->created_at, 'Y/m/d'));

            // Decode the JSON paket
            $paket = json_decode($data->paket, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                // Jika json_decode berhasil
                if (is_array($paket)) {
                    // Gabungkan semua nilai menjadi satu string
                    $paketString = implode(", ", $paket);
                } elseif (is_object($paket)) {
                    // Jika berbentuk objek, ubah menjadi array kemudian gabungkan
                    $paketString = implode(", ", (array) $paket);
                } else {
                    // Jika tipe data lain, langsung jadikan string
                    $paketString = (string) $paket;
                }
            } else {
                // Jika json_decode gagal, set nilai ke string kosong atau pesan error
                $paketString = 'Invalid JSON';
            }

            $sheet->setCellValue('R' . $rows, $paketString);
            $rows++;
        }

        $sheet->setCellValue('S2', $laki_laki);
        $sheet->setCellValue('T2', $perempuan);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
