@extends('layout.admin')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Presensi')
@section('content')
    <h1 class="text-center">Data Presensi</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-12 col-sm-8 col-md-4">
        <label for="" class="mb-2">Cari Data</label>
        <form action="/presensi" method="get">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                <a href="/presensi" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Waktu Presensi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $datum)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $datum->nama }}</td>
                            <td>{{ $datum->jabatan }}</td>
                            <td>{{ date('H:i:s', strtotime($datum->waktu_presensi)) }} WIB,
                                {{ tgl_indonesia3($datum->waktu_presensi) }}
                            </td>
                            <td class="text-center">{{ $datum->status }}</td>
                            <td>
                                <center>
                                    <a href="/presensi/hapus/{{ $datum->id }}" class="btn btn-danger my-2">Hapus</a>
                                </center>
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
