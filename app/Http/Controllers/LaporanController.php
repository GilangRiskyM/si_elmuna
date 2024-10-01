<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends Controller
{
    function index(Request $request)
    {
        $tanggal = $request->filter_tanggal;

        if ($tanggal == 'hari_ini') {
            $sql = Masuk::whereDate('created_at', Carbon::today())->latest()->get();
            $sql2 = Keluar::whereDate('created_at', Carbon::today())->latest()->get();
            $jumlahMasuk = Masuk::whereDate('created_at', Carbon::today())->get();
            $jumlahKeluar = Keluar::whereDate('created_at', Carbon::today())->get();
        } elseif ($tanggal == 'kemarin') {
            $sql = Masuk::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $sql2 = Keluar::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $jumlahMasuk = Masuk::whereDate('created_at', Carbon::yesterday())->get();
            $jumlahKeluar = Keluar::whereDate('created_at', Carbon::yesterday())->get();
        } elseif ($tanggal == 'minggu_ini') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $jumlahMasuk = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            $jumlahKeluar = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        } elseif ($tanggal == 'minggu_lalu') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $jumlahMasuk = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->get();
            $jumlahKeluar = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->get();
        } elseif ($tanggal == 'bulan_ini') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $jumlahMasuk = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
            $jumlahKeluar = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'bulan_lalu') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $jumlahMasuk = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->get();
            $jumlahKeluar = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_ini') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $jumlahMasuk = Masuk::whereYear('created_at', Carbon::now()->year)->get();
            $jumlahKeluar = Keluar::whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_lalu') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $jumlahMasuk = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->get();
            $jumlahKeluar = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->get();
        } else {
            $sql = Masuk::latest()->get();
            $sql2 = Keluar::latest()->get();
            $jumlahMasuk = Masuk::get();
            $jumlahKeluar = Keluar::get();
        }

        $totalMasuk = 0;
        $totalKeluar = 0;

        foreach ($jumlahMasuk as $data) {
            $totalMasuk += $data->jumlah_pemasukan;
        }

        foreach ($jumlahKeluar as $data) {
            $totalKeluar += $data->jumlah_pengeluaran;
        }

        $total = $totalMasuk - $totalKeluar;

        return view('admin.laporan.index', [
            'masuk' => $sql,
            'keluar' => $sql2,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'total' => $total,
            'tanggal' => $tanggal
        ]);
    }

    function export(Request $request)
    {
        $ekspor = $request->ekspor;

        if ($ekspor == 'hari_ini') {
            $sql = Masuk::whereDate('created_at', Carbon::today())->latest()->get();
            $sql2 = Keluar::whereDate('created_at', Carbon::today())->latest()->get();
            $filter = 'Hari Ini tanggal ' . Carbon::today()->format('d-m-Y');
        } elseif ($ekspor == 'kemarin') {
            $sql = Masuk::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $sql2 = Keluar::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $filter = 'Kemarin tanggal ' . Carbon::yesterday()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_ini') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $filter = 'Minggu Ini tanggal ' . Carbon::now()->startOfWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->endOfWeek()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_lalu') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $filter = 'Minggu Lalu tanggal ' . Carbon::now()->subWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->format('d-m-Y');
        } elseif ($ekspor == 'bulan_ini') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'bulan_lalu') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->subMonth()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_ini') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Tahun Ini ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_lalu') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $filter = 'Tahun Lalu ' . Carbon::now()->subYear()->year;
        } else {
            $sql = Masuk::latest()->get();
            $sql2 = Keluar::latest()->get();
            $filter  = 'Semua Data';
        }

        $totalMasuk = 0;
        $totalKeluar = 0;
        foreach ($sql as $data) {
            $totalMasuk += $data->jumlah_pemasukan;
        }

        foreach ($sql2 as $data) {
            $totalKeluar += $data->jumlah_pengeluaran;
        }

        $total = $totalMasuk - $totalKeluar;

        $spreadsheet = new Spreadsheet();
        $filename = 'Rekap Pendapatan ' . $filter . '.xlsx';
        $no = 1;
        $no2 = 1;
        $sheet = $spreadsheet->getActiveSheet();
        $rows = 3;
        $rows2 = 3;

        $sheet->setCellValue('A1', 'Pemasukan');
        $sheet->mergeCells('A1:E1');
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Keterangan Pemasukan');
        $sheet->setCellValue('C2', 'Tanggal Pemasukan');
        $sheet->setCellValue('D2', 'Jumlah Pemasukan (Rp)');
        $sheet->setCellValue('E2', 'Total Pemasukan (Rp)');
        $sheet->setCellValue('G1', 'Pengeluaran');
        $sheet->mergeCells('G1:K1');
        $sheet->setCellValue('G2', 'No');
        $sheet->setCellValue('H2', 'Keterangan Pengeluaran');
        $sheet->setCellValue('I2', 'Tanggal Pengeluaran');
        $sheet->setCellValue('J2', 'Jumlah Pengeluaran (Rp)');
        $sheet->setCellValue('K2', 'Total Pengeluaran (Rp)');
        $sheet->setCellValue('M2', 'Total Pendapatan');


        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->ket_pemasukan);
            $sheet->setCellValue('C' . $rows, date_format($data->created_at, 'd/m/Y'));
            $sheet->setCellValue('D' . $rows, $data->jumlah_pemasukan);
            $rows++;
        }

        foreach ($sql2 as $data) {
            $sheet->setCellValue('G' . $rows2, $no2++);
            $sheet->setCellValue('H' . $rows2, $data->ket_pengeluaran);
            $sheet->setCellValue('I' . $rows2, date_format($data->created_at, 'd/m/Y'));
            $sheet->setCellValue('J' . $rows2, $data->jumlah_pengeluaran);
            $rows2++;
        }

        $sheet->setCellValue('E3', $totalMasuk);
        $sheet->setCellValue('K3', $totalKeluar);
        $sheet->setCellValue('M3', $total);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
