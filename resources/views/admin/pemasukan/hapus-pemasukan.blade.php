@extends('layouts.app')
@section('title', 'Elmuna - Hapus Data Pemasukan')
@section('content')
    <center>
        <h2>Hapus Data Pemasukan</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <h4>
                <div class="col-4 col-md-4 col-sm-4">
                    <table class="table">
                        <tr>
                            <td>Keterangan Pemasukan</td>
                            <td>:</td>
                            <td>{{ $data->ket_pemasukan }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pemasukan</td>
                            <td>:</td>
                            <td>Rp. {{ $data->jumlah_pemasukan }} ,-</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-3">
                    <form action="/destroy-pemasukan/{{ $data->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3" type="submit">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
