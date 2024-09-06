@extends('layouts.app')
@section('title', 'Elmuna - Edit Pemasukan')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Edit Data Pemasukan</h3>
            </center>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger mx-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/edit-pemasukan/{{ $data->id }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="ket_pemasukan" class="form-label">Keterangan Pemasukan</label>
                    <input type="text" name="ket_pemasukan" id="ket_pemasukan" class="form-control"
                        value="{{ $data->ket_pemasukan }}">
                </div>
                <div class="mb-3">
                    <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
                    <input type="number" name="jumlah_pemasukan" id="jumlah_pemasukan" class="form-control"
                        value="{{ $data->jumlah_pemasukan }}">
                </div>
                <div class="my-2">
                    <center>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success ms-2">Kirim</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
