<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Requests\EditMasukRequest;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\TambahPemasukanRequest;

class PemasukanController extends Controller
{
    function index(Request $request)
    {
        $tanggal = $request->filter_tanggal;

        if ($tanggal == 'hari_ini') {
            $sql = Masuk::whereDate('created_at', Carbon::today())->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereDate('created_at', Carbon::today())->get();
        } elseif ($tanggal == 'kemarin') {
            $sql = Masuk::whereDate('created_at', Carbon::yesterday())->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereDate('created_at', Carbon::yesterday())->get();
        } elseif ($tanggal == 'minggu_ini') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        } elseif ($tanggal == 'minggu_lalu') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->get();
        } elseif ($tanggal == 'bulan_ini') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'bulan_lalu') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_ini') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereYear('created_at', Carbon::now()->year)->get();
        } elseif ($tanggal == 'tahun_lalu') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->get();
        } else {
            $sql = Masuk::latest()->paginate(20)->onEachSide(2);
            $sql2 = Masuk::get();
        }

        $total = 0;
        foreach ($sql2 as $data) {
            $total += $data->jumlah_pemasukan;
        }

        return view('admin.pemasukan.index', [
            'sql' => $sql,
            'total' => $total,
            'tanggal' => $tanggal
        ]);
    }

    function create()
    {
        return view('admin.pemasukan.tambah-pemasukan');
    }

    function store(TambahPemasukanRequest $request)
    {
        $request->validated();
        $sql = Masuk::create($request->all());

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Pemasukan Berhasil!!!');
        }

        return redirect('/pemasukan');
    }

    function edit($id)
    {
        $sql = Masuk::findOrFail($id);

        return view('admin.pemasukan.edit-pemasukan', [
            'data' => $sql
        ]);
    }

    function update(EditMasukRequest $request, $id)
    {
        $request->validated();
        $sql = Masuk::findOrFail($id);
        $update = $sql->update($request->all());

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Pemasukan Berhasil!!!');
        }

        return redirect('/pemasukan');
    }

    function delete($id)
    {
        $sql = Masuk::findOrFail($id);

        return view('admin.pemasukan.hapus-pemasukan', [
            'data' => $sql
        ]);
    }

    function destroy($id)
    {
        $sql = Masuk::findOrFail($id);
        $delete = $sql->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Pemasukan Berhasil!!!');
        }

        return redirect('/pemasukan');
    }

    function deletedPemasukan()
    {
        $sql = Masuk::onlyTrashed()->latest()->paginate(20);

        return view('admin.pemasukan.data-terhapus', [
            'sql' => $sql
        ]);
    }

    function restoreData($id)
    {
        $sql = Masuk::withTrashed()
            ->where('id', $id)
            ->restore();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore Data Berhasil!!!');
        }

        return redirect('/pemasukan');
    }

    function deletePermanen($id)
    {
        $sql = Masuk::withTrashed()
            ->findOrFail($id);

        return view('admin.pemasukan.hapus_permanen', [
            'data' => $sql
        ]);
    }

    function forceDelete($id)
    {
        $sql = Masuk::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Berhasil Hapus Data Pemasukan Secara Permanen!!!');
        }

        return redirect('/pemasukan/restore');
    }

    function export(Request $request)
    {
        $ekspor = $request->ekspor;

        if ($ekspor == 'hari_ini') {
            $sql = Masuk::whereDate('created_at', Carbon::today())->latest()->get();
            $filter = 'Hari Ini tanggal ' . Carbon::today()->format('d-m-Y');
        } elseif ($ekspor == 'kemarin') {
            $sql = Masuk::whereDate('created_at', Carbon::yesterday())->latest()->get();
            $filter = 'Kemarin tanggal ' . Carbon::yesterday()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_ini') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            $filter = 'Minggu Ini tanggal ' . Carbon::now()->startOfWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->endOfWeek()->format('d-m-Y');
        } elseif ($ekspor == 'minggu_lalu') {
            $sql = Masuk::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->latest()->get();
            $filter = 'Minggu Lalu tanggal ' . Carbon::now()->subWeek()->format('d-m-Y') . ' sampai ' . Carbon::now()->format('d-m-Y');
        } elseif ($ekspor == 'bulan_ini') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'bulan_lalu') {
            $sql = Masuk::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Bulan ' . Carbon::now()->subMonth()->month . ' tahun ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_ini') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->year)->latest()->get();
            $filter = 'Tahun Ini ' . Carbon::now()->year;
        } elseif ($ekspor == 'tahun_lalu') {
            $sql = Masuk::whereYear('created_at', Carbon::now()->subYear()->year)->latest()->get();
            $filter = 'Tahun Lalu ' . Carbon::now()->subYear()->year;
        } else {
            $sql = Masuk::latest()->get();
            $filter  = 'Semua Data';
        }

        $total = 0;
        foreach ($sql as $data) {
            $total += $data->jumlah_pemasukan;
        }

        // dd($filter);

        $spreadsheet = new Spreadsheet();
        $filename = 'Laporan Pemasukan ' . $filter . '.xlsx';
        $no = 1;
        $sheet = $spreadsheet->getActiveSheet();
        $rows = 2;

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Keterangan Pemasukan');
        $sheet->setCellValue('C1', 'Keterangan Pemasukan');
        $sheet->setCellValue('D1', 'Jumlah Pemasukan (Rp)');
        $sheet->setCellValue('E1', 'Total Pemasukan (Rp)');

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->ket_pemasukan);
            $sheet->setCellValue('C' . $rows, date_format($data->created_at, 'd/m/Y'));
            $sheet->setCellValue('D' . $rows, $data->jumlah_pemasukan);
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
