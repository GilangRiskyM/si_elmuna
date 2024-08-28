<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDesainGrafisRequest;
use App\Http\Requests\TambahDesainGrafisRequest;
use App\Models\DesainGrafis;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DesainGrafisController extends Controller
{
    function create()
    {
        return view('pendaftaran.desain_grafis');
    }


    function store(TambahDesainGrafisRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = DesainGrafis::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_desain_grafis');
    }

    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = DesainGrafis::orderBy('id', 'desc')
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
            $data = DesainGrafis::orderBy('id', 'desc')->get();
        }

        return view('admin.desain_grafis.desain_grafis', ['data' => $data]);
    }

    function filterData(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $data = DesainGrafis::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('admin.desain_grafis.desain_grafis', ['data' => $data]);
    }

    function edit($id)
    {
        $data = DesainGrafis::where('id', $id)->get();

        return view('admin.desain_grafis.edit-desain_grafis', ['data' => $data]);
    }

    function update(EditDesainGrafisRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = DesainGrafis::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_desain_grafis');
    }

    function delete($id)
    {
        $data = DesainGrafis::findOrFail($id);

        return view('admin.desain_grafis.hapus-desain_grafis', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = DesainGrafis::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_desain_grafis');
    }

    function deletedDesainGrafis()
    {
        $data = DesainGrafis::onlyTrashed()->get();

        return view('admin.desain_grafis.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = DesainGrafis::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_desain_grafis');
    }

    function deletePermanen($id)
    {
        $data = DesainGrafis::withTrashed()
            ->findOrFail($id);

        return view('admin.desain_grafis.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = DesainGrafis::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_desain_grafis/terhapus');
    }

    function export(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $sql = DesainGrafis::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        $laki_laki = DesainGrafis::where('jk', 'Laki-laki')->count();
        $perempuan = DesainGrafis::where('jk', 'Perempuan')->count();

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
        $sheet->setCellValue('K1', 'Kode Pos');
        $sheet->setCellValue('L1', 'Agama');
        $sheet->setCellValue('M1', 'Status');
        $sheet->setCellValue('N1', 'Nama Ibu');
        $sheet->setCellValue('O1', 'Nama Ayah');
        $sheet->setCellValue('P1', 'No. WA');
        $sheet->setCellValue('Q1', 'Email');
        $sheet->setCellValue('R1', 'Tanggal Mendaftar');
        $sheet->setCellValue('S1', 'Tanggal Mulai Kursus');
        $sheet->setCellValue('T1', 'Tanggal Selesai Kursus');
        $sheet->setCellValue('U1', 'Paket');
        $sheet->setCellValue('V1', 'Jumlah Peserta Laki-laki');
        $sheet->setCellValue('W1', 'Jumlah Peserta Perempuan');

        $no = 1;
        $rows = 2;


        $filename = "Laporan Daftar Peserta Desain Grafis " . date($start_date) . " sampai " . date($end_date) . ".xlsx";

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, "'" . $data->nik);
            $sheet->setCellValue('C' . $rows, "'" . $data->nisn);
            $sheet->setCellValue('D' . $rows, $data->nama);
            $sheet->setCellValue('E' . $rows, $data->tempat_lahir);

            //Ubah format tgl lahir
            $dateLahir = new DateTime($data->tanggal_lahir);
            $tglLahir = date_format($dateLahir, 'd/m/Y');
            $sheet->setCellValue('F' . $rows, $tglLahir);

            $sheet->setCellValue('G' . $rows, $data->jk);
            $sheet->setCellValue('H' . $rows, $data->alamat);
            $sheet->setCellValue('I' . $rows, $data->kecamatan);
            $sheet->setCellValue('J' . $rows, $data->kabupaten);
            $sheet->setCellValue('K' . $rows, $data->kode_pos);
            $sheet->setCellValue('L' . $rows, $data->agama);
            $sheet->setCellValue('M' . $rows, $data->status);
            $sheet->setCellValue('N' . $rows, $data->nama_ibu);
            $sheet->setCellValue('O' . $rows, $data->nama_ayah);
            $sheet->setCellValue('P' . $rows, "'" . $data->telepon);
            $sheet->setCellValue('Q' . $rows, $data->email);
            $sheet->setCellValue('R' . $rows, date_format($data->created_at, 'd/m/Y'));

            // Pengandaian ada tidaknya value di $data->tgl_mulai
            if ($data->tgl_mulai == !null) {
                $dateMulai = new DateTime($data->tgl_mulai);
                $tglMulai = date_format($dateMulai, 'd/m/Y');
            } else {
                $tglMulai = '-';
            }
            $sheet->setCellValue('S' . $rows, $tglMulai);

            // Pengandaian ada tidaknya value di $data->tgl_selesai
            if ($data->tgl_selesai == !null) {
                $dateSelesai = new DateTime($data->tgl_selesai);
                $tglSelesai = date_format($dateSelesai, 'd/m/Y');
            } else {
                $tglSelesai = '-';
            }
            $sheet->setCellValue('T' . $rows, $tglSelesai);

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
                $paketString = '-';
            }

            $sheet->setCellValue('U' . $rows, $paketString);
            $rows++;
        }

        $sheet->setCellValue('V2', $laki_laki);
        $sheet->setCellValue('W2', $perempuan);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
