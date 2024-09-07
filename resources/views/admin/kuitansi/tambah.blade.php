@extends('layout.admin')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Tambah Kuitansi')
@push('css')
    <style>
        form {
            font-family: "Times New Roman";
            margin: 0;
            padding: 0;
        }

        .garis {
            border-bottom: 2px solid black;
            border-top: 2px solid black;
        }

        .garis-bawah {
            border-bottom: 2px solid black;
        }

        .garis-strip {
            border-top: 1px dashed black;
        }
    </style>
@endpush
@section('content')
    <center>
        <h3>Form Tambah Data Kuitansi</h3>
    </center>
    <hr>
    <form action="/tambah-kuitansi" method="post">
        @csrf
        <div class="row">
            <div class="col-10 garis">
                <center>
                    <font size="5"><b>B U K T I &nbsp; P E M B A Y A R A N</b></font>
                </center>
            </div>
            <div class="col-2 garis">
                <center>
                    <font size="3"><b>01</b></font>
                </center>
            </div>
            <div class="col-9">
                <div class="garis-bawah">
                    <center>
                        <font size="4"><b>LKP/LPK ELMUNA</b></font>
                        <br>
                        <font size="3">
                            <b> JL. SOKA PETANAHAN NO. 10 KM. 6 KEC. KLIRONG KAB. KEBUMEN </b>
                        </font>
                        <br>
                        <font size="3">
                            <b>NO HP/WA 082134389173, 085325636373</b>
                        </font>
                    </center>
                </div>
                <br>
                <table>
                    <tr>
                        <td>Nama &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="text" name="nama" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Guna Membayar &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="text" name="guna_byr1" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>
                            <input class="form-control" type="text" name="guna_byr2" id="">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input class="form-control" type="text" name="guna_byr3" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Diterima (Rp)&nbsp;</td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="number" name="jumlah" id="" required
                                value="{{ $data->jumlah_pemasukan }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Terbilang &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="text" name="terbilang" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Pembayaran &nbsp;</td>
                        <td>:</td>
                        <td>
                            <select name="pembayaran" id="" class="form-select select2"
                                data-placeholder="Pilih Pembayaran">
                                <option></option>
                                <option value="ANGSUR">ANGSUR</option>
                                <option value="LUNAS">LUNAS</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-3">
                <table>
                    <tr>
                        <td>NO.KWT</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>XXXX-{{ date('Y') }}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ date('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>HARI</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ tgl_indonesia4(date('w')) }}</td>
                    </tr>
                    <tr>
                        <td>JAM</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ date('H.i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-9">
                <font size="2">
                    <i><b>Catatan :</b></i>
                    <br>
                    <i>Biaya yang sudah dibayarkan tidak dapat diambil kembali</i>
                    <br>
                    <i>
                        Kuitansi ini diolah oleh komputer dan sah, apabila ada Nama, Cap,
                        dan
                    </i>
                    <br>
                    <i>Tanda tangan penerima</i>
                </font>
            </div>
            <div class="col-3">
                <center>
                    <font size="4"> PENERIMA </font>
                    <br>
                    <br>
                    <br>
                    <font size="">
                        <input class="form-control" type="text" name="penerima" id="" required>
                    </font>
                </center>
            </div>
        </div>
        <br>
        <div class="col-12">
            <center>
                <font size="3">
                    *** Terimakasih ***
                </font>
                <br>
                <table>
                    <tr>
                        <td>Ket</td>
                        <td>
                            <select class="form-select select2" name="cara_bayar" id=""
                                data-placeholder="Pilih Cara Bayar">
                                <option></option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="TRANSFER">TRANSFER</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
        <hr>
        <div class="my-2">
            <center>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button type="reset" class="btn btn-danger mx-2">Batal</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </center>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(".select2").select2({
            theme: "bootstrap-5",
        });
    </script>
@endpush
