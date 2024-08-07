@extends('layout.admin')
@section('title', 'Elmuna - Data Komputer')
@section('content')
    <center>
        <h1>Data Peserta Kursus Komputer Yang Dihapus</h1>
    </center>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="my-3">
        <a href="/data_komputer" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="align-middle">
                    <th>No</th>
                    <th>NIK</th>
                    <th>NISN</th>
                    <th>Nama Peserta</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>No. WA</th>
                    <th>Email</th>
                    <th>Tanggal Mendaftar</th>
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
                            <td>{{ $datum->nisn }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>{{ $datum->tempat_lahir }}</td>
                            <td>{{ $datum->tanggal_lahir }}</td>
                            <td>{{ $datum->jk }}</td>
                            <td>{{ $datum->alamat }}</td>
                            <td>{{ $datum->kecamatan }}</td>
                            <td>{{ $datum->kabupaten }}</td>
                            <td>{{ $datum->agama }}</td>
                            <td>{{ $datum->status }}</td>
                            <td>{{ $datum->nama_ibu }}</td>
                            <td>{{ $datum->nama_ayah }}</td>
                            <td>{{ $datum->telepon }}</td>
                            <td>{{ $datum->email }}</td>
                            <td>{{ tgl_indonesia3($datum->created_at) }}</td>
                            <td>
                                @php
                                    $paketan = json_decode($datum->paket);
                                @endphp
                                @foreach ($paketan as $paket)
                                    {{ $paket }},
                                @endforeach
                            </td>
                            <td>
                                <a href="/restore-komputer/{{ $datum->id }}" class="btn btn-success">Restore</a>
                                <a href="/hapus_permanen_komputer/{{ $datum->id }}" class="btn btn-danger my-2">Hapus
                                    Permanen</a>
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
