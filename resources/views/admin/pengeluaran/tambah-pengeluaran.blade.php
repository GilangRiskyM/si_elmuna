@extends('layouts.app')
@section('title', 'Elmuna - Tambah Pengeluaran')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Tambah Data Pengeluaran</h3>
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
            <form action="/tambah-pengeluaran" method="post">
                @csrf
                <div class="mb-3">
                    <label for="ket_pengeluaran" class="form-label">Keterangan Pengeluaran</label>
                    <input type="text" name="ket_pengeluaran" id="ket_pengeluaran" class="form-control"
                        value="{{ old('ket_pengeluaran') }}">
                </div>
                <div class="mb-3">
                    <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                    <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" class="form-control"
                        value="{{ old('jumlah_pengeluaran') }}">
                </div>
                <div class="my-2">
                    <center>
                        <a href="/pengeluaran" class="btn btn-secondary">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Batal</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
