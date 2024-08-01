@extends('layout.admin')
@section('title', 'Elmuna - Data Mengemudi')
@section('content')
    <center>
        <h1>DATA PESERTA KURSUS MENGEMUDI</h1>
    </center>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                            <td>
                                <a href="/edit_mengemudi/{{ $datum->id }}" class="btn btn-warning">Edit</a>
                                <a href="/hapus_mengemudi/{{ $datum->id }}" class="btn btn-danger my-2">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="14">
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
