@extends('layouts.app')
@section('title', 'Elmuna - Hapus Data Pengeluaran')
@section('content')
    <center>
        <h2>Hapus Data Pengeluaran</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <h4>
                <div class="col-4 col-md-4 col-sm-4">
                    <table class="table">
                        <tr>
                            <td>Keterangan Pengeluaran</td>
                            <td>:</td>
                            <td>{{ $data->ket_pengeluaran }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pengeluaran</td>
                            <td>:</td>
                            <td>Rp. {{ $data->jumlah_pengeluaran }} ,-</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-3">
                    <form action="/destroy-pengeluaran/{{ $data->id }}" method="POST">
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
