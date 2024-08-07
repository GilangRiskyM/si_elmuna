@extends('layout.main')
@section('title', 'Elmuna - Daftar Komputer')
@section('content')
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Form Pendaftaran Kursus Komputer</h3>
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
            <form action="/tambah-komputer" method="post">
                @csrf
                <center>
                    <h5>Identitas Peserta</h5>
                </center>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}">
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                        value="{{ old('tempat_lahir') }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                        value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select select2"
                        data-placeholder="Pilih Jenis Kelamin">
                        <option></option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                        value="{{ old('kecamatan') }}">
                </div>
                <div class="mb-3">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control"
                        value="{{ old('kabupaten') }}">
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama') }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Pekerjaan</label>
                    <select name="status" id="status" class="form-select select2"
                        data-placeholder="Pilih Status Pekerjaan">
                        <option></option>
                        <option>Bekerja</option>
                        <option>Pelajar/Mahasiswa</option>
                        <option>Tidak Bekerja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control"
                        value="{{ old('nama_ibu') }}">
                </div>
                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control"
                        value="{{ old('nama_ayah') }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. WA</label>
                    <input type="text" name="telepon" id="telepon" class="form-control"
                        aria-describedby="teleponHelp" value="{{ old('telepon') }}" placeholder="Ganti 08 menjadi 628">
                    <div id="teleponHelp" class="form-text">Misal 08131111222 menjadi 6281311112222</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Pilih Paket</label>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_ms_office_lengkap" class="form-check-input"
                            value="PAKET MS. OFFICE LENGKAP">
                        <label for="paket_ms_office_lengkap" class="form-check-label">PAKET MS. OFFICE LENGKAP</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_ms_office_word" class="form-check-input"
                            value="PAKET MS. OFFICE WORD">
                        <label for="paket_ms_office_word" class="form-check-label">PAKET MS. OFFICE WORD</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_ms_office_excel" class="form-check-input"
                            value="PAKET MS. OFFICE EXCEL">
                        <label for="paket_ms_office_excel" class="form-check-label">PAKET MS. OFFICE EXCEL</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_ms_office_power_point" class="form-check-input"
                            value="PAKET MS. OFFICE POWER POINT">
                        <label for="paket_ms_office_power_point" class="form-check-label">PAKET MS. OFFICE POWER
                            POINT</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_ms_office_power_point_spesial"
                            class="form-check-input" value="PAKET MS. OFFICE POWER POINT SPESIAL">
                        <label for="paket_ms_office_power_point_spesial" class="form-check-label">PAKET MS. OFFICE POWER
                            POINT SPESIAL</label>
                    </div>


                </div>
                <div class="my-2">
                    <center>
                        <a href="/" class="btn btn-secondary">Kembali</a>
                        <button type="reset" class="btn btn-danger mx-2">Batal</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(".select2").select2({
            theme: "bootstrap-5",
        });
    </script>
@endpush
