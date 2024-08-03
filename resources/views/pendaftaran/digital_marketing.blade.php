@extends('layout.main')
@section('title', 'Elmuna - Daftar Digital Marketing')
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
                <h3>Form Pendaftaran Kursus Digital Marketing</h3>
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
            <form action="/tambah-digital_marketing" method="post">
                @csrf
                <center>
                    <h5>Identitas Peserta</h5>
                </center>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" aria-describedby="nikHelp"
                        value="{{ old('nik') }}">
                    <div id="nikHelp" class="form-text">NIK wajib 16 digit berupa angka</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
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
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control"
                        value="{{ old('nama_ayah') }}">
                </div>
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. WA</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" aria-describedby="teleponHelp"
                        value="{{ old('telepon') }}" placeholder="Ganti 08 menjadi 628">
                    <div id="teleponHelp" class="form-text">Misal 08131111222 menjadi 6281311112222</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-select select2"
                        data-placeholder="Pilih Kecamatan">
                        <option></option>
                        <option>Adimulyo</option>
                        <option>Alian</option>
                        <option>Ambal</option>
                        <option>Ayah</option>
                        <option>Bonorowo</option>
                        <option>Buayan</option>
                        <option>Buluspesantren</option>
                        <option>Gombong</option>
                        <option>Karanganyar</option>
                        <option>Karanggayam</option>
                        <option>Karangsambung</option>
                        <option>Kebumen</option>
                        <option>Klirong</option>
                        <option>Kutowinangun</option>
                        <option>Kuwarasan</option>
                        <option>Mirit</option>
                        <option>Padureso</option>
                        <option>Pejagoan</option>
                        <option>Petanahan</option>
                        <option>Poncowarno</option>
                        <option>Prembun</option>
                        <option>Puring</option>
                        <option>Rowokele</option>
                        <option>Sadang</option>
                        <option>Sempor</option>
                        <option>Sruweng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Pilih Paket</label>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_pemula" class="form-check-input"
                            value="PAKET PEMULA">
                        <label for="paket_pemula" class="form-check-label">PAKET PEMULA</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="paket_mahir" class="form-check-input"
                            value="PAKET MAHIR">
                        <label for="paket_mahir" class="form-check-label">PAKET MAHIR</label>
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
