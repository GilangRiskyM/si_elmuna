<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDigitalMarketingRequest;
use App\Http\Requests\TambahDigitalMarketingRequest;
use App\Models\DigitalMarketing;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DigitalMarketingController extends Controller
{
    function create()
    {
        return view('pendaftaran.digital_marketing');
    }

    function store(TambahDigitalMarketingRequest $request)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = DigitalMarketing::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Anda [' . $request->nama . '] Berhasil Mendaftar!!!');
        }

        return redirect('/daftar_digital_marketing');
    }

    function index(Request $request)
    {
        $cari = $request->cari;

        if (isset($request->cari)) {
            $data = DigitalMarketing::orderBy('id', 'desc')
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
            $data = DigitalMarketing::orderBy('id', 'desc')->get();
        }

        return view('admin.digital_marketing.digital_marketing', ['data' => $data]);
    }

    function filterData(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $data = DigitalMarketing::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('admin.digital_marketing.digital_marketing', ['data' => $data]);
    }

    function edit($id)
    {
        $data = DigitalMarketing::where('id', $id)->get();

        return view('admin.digital_marketing.edit-digital_marketing', ['data' => $data]);
    }

    function update(EditDigitalMarketingRequest $request, $id)
    {
        $request->validated();
        $request['paket'] = json_encode($request->paket);
        $sql = DigitalMarketing::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Berhasil!!!');
        }

        return redirect('/data_digital_marketing');
    }

    function delete($id)
    {
        $data = DigitalMarketing::findOrFail($id);

        return view('admin.digital_marketing.hapus-digital_marketing', ['data' => $data]);
    }

    function destroy($id)
    {
        $sql = DigitalMarketing::findOrFail($id);
        $delete = $sql->delete();
        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil!!!');
        }

        return redirect('/data_digital_marketing');
    }

    function deletedDigitalMarketing()
    {
        $data = DigitalMarketing::onlyTrashed()->get();

        return view('admin.digital_marketing.data-terhapus', ['data' => $data]);
    }

    function restoreData($id)
    {
        $sql = DigitalMarketing::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/data_digital_marketing');
    }

    function deletePermanen($id)
    {
        $data = DigitalMarketing::withTrashed()
            ->findOrFail($id);

        return view('admin.digital_marketing.hapus-permanen', ['data' => $data]);
    }

    function forceDelete($id)
    {
        $sql = DigitalMarketing::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Secara Permanen!!!');
        }

        return redirect('/data_digital_marketing/terhapus');
    }

    function export(Request $request)
    {
        $start_date = $request->tgl_awal;
        $end_date = $request->tgl_akhir;

        $sql = DigitalMarketing::orderBy('id', 'desc')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        $laki_laki = DigitalMarketing::where('jk', 'Laki-laki')->count();
        $perempuan = DigitalMarketing::where('jk', 'Perempuan')->count();

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


        $filename = "Laporan Daftar Peserta Digital Marketing " . date($start_date) . " sampai " . date($end_date) . ".xlsx";

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
