@extends('layout.admin')
@section('title', 'Elmuna - Data Mengemudi')
@section('content')
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Peserta</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>No. WA</th>
                    <th>Email</th>
                    <th>Kecamatan</th>
                    <th>Paket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datum->nik }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>{{ $datum->alamat }}</td>
                            <td>{{ $datum->tempat_lahir }}</td>
                            <td>{{ $datum->tanggal_lahir }}</td>
                            <td>{{ $datum->jk }}</td>
                            <td>{{ $datum->nama_ayah }}</td>
                            <td>{{ $datum->nama_ibu }}</td>
                            <td>{{ $datum->telepon }}</td>
                            <td>{{ $datum->email }}</td>
                            <td>{{ $datum->kecamatan }}</td>
                            <td>
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