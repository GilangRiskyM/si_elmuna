@extends('layout.admin')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Elmuna - Data Desain Grafis')
@section('content')
    <center>
        <h1>DATA PESERTA KURSUS DESAIN GRAFIS</h1>
    </center>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="my-3">
        <a href="/data_desain_grafis/terhapus" class="btn btn-secondary">Restore Data</a>
    </div>
    <hr>
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="/data_desain_grafis" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="/data_desain_grafis" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-6">
        <label class="mb-2">Filter Tanggal Mendaftar</label>
        <form action="/data_desain_grafis/filter" method="get">
            <div class="input-group">
                <span class="input-group-text">Dari Tanggal : </span>
                <input type="date" class="form-control" name="tgl_awal" required>
                <span class="input-group-text">Sampai Tanggal : </span>
                <input type="date" name="tgl_akhir" class="form-control" required>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/data_desain_grafis" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-6">
        <label class="mb-2">Export Data ke Excel</label>
        <form action="/data_desain_grafis/export" method="post">
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
        <table class="table table-striped table-bordered table-hover">
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
                    <th>Kode Pos</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Nama Ibu</th>
                    <th>Nama Ayah</th>
                    <th>No. WA</th>
                    <th>Email</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Mulai Kursus</th>
                    <th>Tanggal Selesai Kursus</th>
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
                            <td>{{ $datum->kode_pos }}</td>
                            <td>{{ $datum->agama }}</td>
                            <td>{{ $datum->status }}</td>
                            <td>{{ $datum->nama_ibu }}</td>
                            <td>{{ $datum->nama_ayah }}</td>
                            <td>{{ $datum->telepon }}</td>
                            <td>{{ $datum->email }}</td>
                            <td>{{ tgl_indonesia3($datum->created_at) }}</td>
                            <td>
                                @if ($datum->tgl_mulai == !null)
                                    {{ tgl_indonesia3($datum->tgl_mulai) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($datum->tgl_selesai == !null)
                                    {{ tgl_indonesia3($datum->tgl_selesai) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @php
                                    $paketan = json_decode($datum->paket);
                                @endphp
                                @foreach ($paketan as $paket)
                                    {{ $paket }},
                                @endforeach
                            </td>
                            <td>
                                <a href="/edit_desain_grafis/{{ $datum->id }}" class="btn btn-warning">Edit</a>
                                <a href="/hapus_desain_grafis/{{ $datum->id }}" class="btn btn-danger my-2">Hapus</a>
                                <a href="/sertifikat/tambah/desain-grafis/{{ $datum->id }}" class="btn btn-primary">Buat
                                    Sertifikat</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="22">
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
