<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDigitalMarketingRequest;
use App\Http\Requests\TambahDigitalMarketingRequest;
use App\Models\DigitalMarketing;
use Illuminate\Support\Facades\Session;

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

    function index()
    {
        $data = DigitalMarketing::get();

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
}
