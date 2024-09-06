<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\Isset_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditKeluarRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\TambahPengeluaranRequest;

class PengeluaranController extends Controller
{
    function index(Request $request)
    {
        $tanggal = $request->filter_tanggal;

        if ($tanggal == 'hari_ini') {
            $sql = Keluar::whereDate('created_at', Carbon::today())->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereDate('created_at', Carbon::today())->get();
        } elseif ($tanggal == 'kemarin') {
            $sql = Keluar::whereDate('created_at', Carbon::yesterday())->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereDate('created_at', Carbon::yesterday())->get();
        } elseif ($tanggal == 'minggu_ini') {
            $sql = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        } elseif ($tanggal == 'minggu_lalu') {
            $sql = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->get();
        } elseif ($tanggal == 'bulan_ini') {
            $sql = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'bulan_lalu') {
            $sql = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_ini') {
            $sql = Keluar::whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_lalu') {
            $sql = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->get();
        } else {
            $sql = Keluar::latest()->paginate(20)->onEachSide(2);
            $sql2 = Keluar::get();
        }

        $total = 0;
        foreach ($sql2 as $data) {
            $total += $data->jumlah_pengeluaran;
        }

        return view('admin.pengeluaran.index', [
            'sql' => $sql,
            'total' => $total,
            'tanggal' => $tanggal
        ]);
    }

    function create()
    {
        return view('admin.pengeluaran.tambah-pengeluaran');
    }

    function store(TambahPengeluaranRequest $request)
    {
        $request->validated();
        $sql = Keluar::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Pengeluaran Berhasil!!!');
        }

        return redirect('/pengeluaran');
    }

    function edit($id)
    {
        $sql = Keluar::findOrFail($id);

        return view('admin.pengeluaran.edit-pengeluaran', [
            'data' => $sql
        ]);
    }

    function update(EditKeluarRequest $request, $id)
    {
        $request->validated();
        $sql = Keluar::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Pengeluaran Berhasil!!!');
        }

        return redirect('/pengeluaran');
    }

    function delete($id)
    {
        $sql = Keluar::findOrFail($id);

        return view('admin.pengeluaran.hapus-pengeluaran', [
            'data' => $sql
        ]);
    }

    function destroy($id)
    {
        $sql = Keluar::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Pengeluaran Berhasil!!!');
        }

        return redirect('/pengeluaran');
    }

    function deletedPengeluaran()
    {
        $sql = Keluar::onlyTrashed()->latest()->paginate(20);

        return view('admin.pengeluaran.data-terhapus', [
            'sql' => $sql
        ]);
    }

    function restoreData($id)
    {
        $sql = Keluar::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/pengeluaran');
    }

    function deletePermanen($id)
    {
        $sql = Keluar::withTrashed()
            ->findOrFail($id);

        return view('admin.pengeluaran.hapus_permanen', [
            'data' => $sql
        ]);
    }

    function forceDelete($id)
    {
        $sql = Keluar::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Pengeluaran Secara Permanen!!!');
        }

        return redirect('/pengeluaran/restore');
    }

    function export(Request $request)
    {
        $ekspor = $request->ekspor;

        if ($ekspor == 'hari_ini') {
            $sql = Keluar::whereDate('created_at', Carbon::today())->latest()->get();
            $filter = 'Hari Ini tanggal ' . Carbon::today()->format('d-m-Y');
        } elseif ($ekspor == 'kemarin') {
            $sql = Keluar::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $filter = 'Kemarin tanggal ' . Carbon::yesterday()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_ini') {
            $sql = Keluar::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $filter = 'Minggu Ini tanggal ' . Carbon::now()->startOfWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->endOfWeek()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_lalu') {
            $sql = Keluar::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $filter = 'Minggu Lalu tanggal ' . Carbon::now()->subWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->format('d-m-Y');
        } elseif ($ekspor == 'bulan_ini') {
            $sql = Keluar::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'bulan_lalu') {
            $sql = Keluar::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->subMonth()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_ini') {
            $sql = Keluar::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Tahun Ini ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_lalu') {
            $sql = Keluar::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $filter = 'Tahun Lalu ' . Carbon::now()->subYear()->year;
        } else {
            $sql = Keluar::latest()->get();
            $filter  = 'Semua Data';
        }

        $total = 0;
        foreach ($sql as $data) {
            $total += $data->jumlah_pengeluaran;
        }

        // dd($filter);

        $spreadsheet = new Spreadsheet();
        $filename = 'Laporan Pengeluaran ' . $filter . '.xlsx';
        $no = 1;
        $sheet = $spreadsheet->getActiveSheet();
        $rows = 2;

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Keterangan Pengeluaran');
        $sheet->setCellValue('C1', 'Keterangan Pengeluaran');
        $sheet->setCellValue('D1', 'Jumlah Pengeluaran (Rp)');
        $sheet->setCellValue('E1', 'Total Pengeluaran (Rp)');

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->ket_pengeluaran);
            $sheet->setCellValue('C' . $rows, date_format($data->created_at, 'd/m/Y'));
            $sheet->setCellValue('D' . $rows, $data->jumlah_pengeluaran);
            $rows++;
        }

        $sheet->setCellValue('E2', $total);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
