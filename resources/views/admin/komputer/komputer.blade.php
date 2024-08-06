@extends('layout.admin')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Elmuna - Data Komputer')
@section('content')
    <center>
        <h1>DATA PESERTA KURSUS KOMPUTER</h1>
    </center>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="my-3">
        <a href="/data_komputer/terhapus" class="btn btn-secondary">Restore Data</a>
    </div>
    <hr>
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="/data_komputer" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="/data_komputer" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-6">
        <label class="mb-2">Filter Data</label>
        <form action="/data_komputer/filter" method="get">
            <div class="input-group">
                <span class="input-group-text">Dari Tanggal : </span>
                <input type="date" class="form-control" name="tgl_awal" required>
                <span class="input-group-text">Sampai Tanggal : </span>
                <input type="date" name="tgl_akhir" class="form-control" required>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/data_komputer" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-6">
        <label class="mb-2">Export Data</label>
        <form action="/data_komputer/export" method="post">
            @csrf
            <div class="input-group">
                <span class="input-group-text">Dari Tanggal : </span>
                <input type="date" class="form-control" name="tgl_awal" required>
                <span class="input-group-text">Sampai Tanggal : </span>
                <input type="date" name="tgl_akhir" class="form-control" required>
                <button type="submit" class="btn btn-success">Export</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="align-middle">
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nama Ayah</th>
                    <th scope="col">Nama Ibu</th>
                    <th scope="col">No. WA</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Paket</th>
                    <th>Tanggal Mendaftar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td scope="row">{{ $datum->nik }}</td>
                            <td scope="row">{{ $datum->nama }}</td>
                            <td scope="row">{{ $datum->alamat }}</td>
                            <td scope="row">{{ $datum->tempat_lahir }}</td>
                            <td scope="row">{{ $datum->tanggal_lahir }}</td>
                            <td scope="row">{{ $datum->jk }}</td>
                            <td scope="row">{{ $datum->nama_ayah }}</td>
                            <td scope="row">{{ $datum->nama_ibu }}</td>
                            <td scope="row">{{ $datum->telepon }}</td>
                            <td scope="row">{{ $datum->email }}</td>
                            <td scope="row">{{ $datum->kecamatan }}</td>
                            <td scope="row">
                                @php
                                    $paketan = json_decode($datum->paket);
                                @endphp
                                @foreach ($paketan as $paket)
                                    {{ $paket }},
                                @endforeach
                            </td>
                            <td>{{ tgl_indonesia3($datum->tanggal) }}</td>
                            <td>
                                <a href="/edit_komputer/{{ $datum->id }}" class="btn btn-warning">Edit</a>
                                <a href="/hapus_komputer/{{ $datum->id }}" class="btn btn-danger my-2">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="15">
                            <center>
                                <h3>Data Kosong</h3>
                            </center>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
