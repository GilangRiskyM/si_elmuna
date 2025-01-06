@extends('layout.admin')
@section('title', 'Tambah Karyawan')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Tambah Data Karyawan</h3>
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
            <form action="/tambah-karyawan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan') }}">
                </div>
                <div class="mb-3">
                    <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                    <input type="file" name="tanda_tangan" id="tanda_tangan" class="form-control"
                        value="{{ old('tanda_tangan') }}">
                </div>
                <div class="my-2">
                    <center>
                        <a href="/karyawan" class="btn btn-secondary">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Batal</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
