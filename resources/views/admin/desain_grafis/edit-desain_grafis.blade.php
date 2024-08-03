@extends('layout.admin')
@section('title', 'Elmuna - Edit Desain Grafis')
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
                <h3>Form Edit Peserta Kursus Desain Grafis</h3>
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
            @php
                $paket = json_decode($data[0]->paket);
            @endphp
            <form action="/update-desain_grafis/{{ $data[0]->id }}" method="post">
                @csrf
                @method('put')
                <center>
                    <h5>Identitas Peserta</h5>
                </center>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" aria-describedby="nikHelp"
                        value="{{ $data[0]->nik }}">
                    <div id="nikHelp" class="form-text">NIK wajib 16 digit berupa angka</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data[0]->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $data[0]->alamat }}">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                        value="{{ $data[0]->tempat_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                        value="{{ $data[0]->tanggal_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select select2"
                        data-placeholder="Pilih Jenis Kelamin">
                        <option value="Laki-laki" {{ $data[0]->jk == 'Laki-laki' ? 'selected' : null }}>Laki-laki</option>
                        <option value="Perempuan" {{ $data[0]->jk == 'Perempuan' ? 'selected' : null }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control"
                        value="{{ $data[0]->nama_ayah }}">
                </div>
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control"
                        value="{{ $data[0]->nama_ibu }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. WA</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" aria-describedby="teleponHelp"
                        value="{{ $data[0]->telepon }}" placeholder="Ganti 08 menjadi 628">
                    <div id="teleponHelp" class="form-text">Misal 08131111222 menjadi 6281311112222</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $data[0]->email }}">
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-select select2"
                        data-placeholder="Pilih Kecamatan">
                        <option value="Adimulyo" {{ $data[0]->kecamatan == 'Adimulyo' ? 'selected' : null }}>Adimulyo
                        </option>
                        <option value="Alian" {{ $data[0]->kecamatan == 'Alian' ? 'selected' : null }}>Alian</option>
                        <option value="Ambal" {{ $data[0]->kecamatan == 'Ambal' ? 'selected' : null }}>Ambal</option>
                        <option value="Ayah" {{ $data[0]->kecamatan == 'Ayah' ? 'selected' : null }}>Ayah</option>
                        <option value="Bonorowo" {{ $data[0]->kecamatan == 'Bonorowo' ? 'selected' : null }}>Bonorowo
                        </option>
                        <option value="Buayan" {{ $data[0]->kecamatan == 'Buayan' ? 'selected' : null }}>Buayan</option>
                        <option value="Buluspesantren" {{ $data[0]->kecamatan == 'Buluspesantren' ? 'selected' : null }}>
                            Buluspesantren</option>
                        <option value="Gombong" {{ $data[0]->kecamatan == 'Gombong' ? 'selected' : null }}>Gombong
                        </option>
                        <option value="Karanganyar" {{ $data[0]->kecamatan == 'Karanganyar' ? 'selected' : null }}>
                            Karanganyar</option>
                        <option value="Karanggayam" {{ $data[0]->kecamatan == 'Karanggayam' ? 'selected' : null }}>
                            Karanggayam</option>
                        <option value="Karangsambung" {{ $data[0]->kecamatan == 'Karangsambung' ? 'selected' : null }}>
                            Karangsambung</option>
                        <option value="Kebumen" {{ $data[0]->kecamatan == 'Kebumen' ? 'selected' : null }}>Kebumen
                        </option>
                        <option value="Klirong" {{ $data[0]->kecamatan == 'Klirong' ? 'selected' : null }}>Klirong
                        </option>
                        <option value="Kutowinangun" {{ $data[0]->kecamatan == 'Kutowinangun' ? 'selected' : null }}>
                            Kutowinangun</option>
                        <option value="Kuwarasan" {{ $data[0]->kecamatan == 'Kuwarasan' ? 'selected' : null }}>Kuwarasan
                        </option>
                        <option value="Mirit" {{ $data[0]->kecamatan == 'Mirit' ? 'selected' : null }}>Mirit</option>
                        <option value="Padureso" {{ $data[0]->kecamatan == 'Padureso' ? 'selected' : null }}>Padureso
                        </option>
                        <option value="Pejagoan" {{ $data[0]->kecamatan == 'Pejagoan' ? 'selected' : null }}>Pejagoan
                        </option>
                        <option value="Petanahan" {{ $data[0]->kecamatan == 'Petanahan' ? 'selected' : null }}>Petanahan
                        </option>
                        <option value="Poncowarno" {{ $data[0]->kecamatan == 'Poncowarno' ? 'selected' : null }}>
                            Poncowarno</option>
                        <option value="Prembun" {{ $data[0]->kecamatan == 'Prembun' ? 'selected' : null }}>Prembun
                        </option>
                        <option value="Puring" {{ $data[0]->kecamatan == 'Puring' ? 'selected' : null }}>Puring</option>
                        <option value="Rowokele" {{ $data[0]->kecamatan == 'Rowokele' ? 'selected' : null }}>Rowokele
                        </option>
                        <option value="Sadang" {{ $data[0]->kecamatan == 'Sadang' ? 'selected' : null }}>Sadang</option>
                        <option value="Sempor" {{ $data[0]->kecamatan == 'Sempor' ? 'selected' : null }}>Sempor</option>
                        <option value="Sruweng" {{ $data[0]->kecamatan == 'Sruweng' ? 'selected' : null }}>Sruweng
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Pilih Paket</label>
                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="desain_grafis_corel_draw" class="form-check-input"
                            value="DESAIN GRAFIS COREL DRAW"
                            {{ in_array('DESAIN GRAFIS COREL DRAW', $paket) ? 'checked' : '' }}>
                        <label for="desain_grafis_corel_draw" class="form-check-label">DESAIN GRAFIS COREL DRAW</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="desain_grafis_adobe_photoshop"
                            class="form-check-input" value="DESAIN GRAFIS ADOBE PHOTOSHOP"
                            {{ in_array('DESAIN GRAFIS ADOBE PHOTOSHOP', $paket) ? 'checked' : '' }}>
                        <label for="desain_grafis_adobe_photoshop" class="form-check-label">DESAIN GRAFIS ADOBE
                            PHOTOSHOP</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="paket[]" id="desain_grafis_canva" class="form-check-input"
                            value="DESAIN GRAFIS CANVA" {{ in_array('DESAIN GRAFIS CANVA', $paket) ? 'checked' : '' }}>
                        <label for="desain_grafis_canva" class="form-check-label">DESAIN GRAFIS CANVA</label>
                    </div>



                </div>
                <div class="my-2">
                    <center>
                        <a href="/data_desain_grafis" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success ms-2">Kirim</button>
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
