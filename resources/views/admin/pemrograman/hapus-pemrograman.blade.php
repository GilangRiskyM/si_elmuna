@extends('layout.admin')
@section('title', 'Elmuna - Hapus Pemrograman')
@section('content')
    <center>
        <h2>Hapus Data Peserta Pemrograman</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <h4><b>Identitas Peserta</b></h4>
            <h4>
                <table class="table">
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td>{{ $data->nisn }}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>{{ $data->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $data->jk }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{ $data->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td>{{ $data->kabupaten }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ $data->agama }}</td>
                    </tr>
                    <tr>
                        <td>Status Pekerjaan</td>
                        <td>:</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td>{{ $data->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td>{{ $data->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td>No. WA</td>
                        <td>:</td>
                        <td>{{ $data->telepon }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                    <tr>
                        <td>Paket</td>
                        <td>:</td>
                        <td>
                            @php
                                $paketan = json_decode($data->paket);
                            @endphp
                            @foreach ($paketan as $paket)
                                {{ $paket }},
                            @endforeach
                        </td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/destroy-pemrograman/{{ $data->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/data_pemrograman" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3" type="submit">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
