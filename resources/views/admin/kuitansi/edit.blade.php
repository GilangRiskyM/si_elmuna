@extends('layouts.app')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Elmuna Edit Kuitansi')
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
        <h3>Form Edit Data Kuitansi</h3>
    </center>
    <hr>
    <form action="/edit-kuitansi/{{ $data->id }}" method="post">
        @csrf
        @method('put')
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
                        <font size="4"><b>LKP ELMUNA</b></font>
                        <br>
                        <font size="3">
                            <b> JL. SOKA PETANAHAN NO. 10 KM. 6 KEC. KLIRONG KAB. KEBUMEN </b>
                        </font>
                        <br>
                        <font size="3">
                            <b>NO HP/WA 082134389173, 085325636373, 087837973541</b>
                        </font>
                    </center>
                </div>
                <br>
                <table>
                    <tr>
                        <td>Nama &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" id="" required value="{{ $data->nama }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Guna Membayar &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="guna_byr1" id="" required value="{{ $data->guna_byr1 }}">
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td>
                            <input type="text" name="guna_byr2" id="" value="{{ $data->guna_byr2 }}">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" name="guna_byr3" id="" value="{{ $data->guna_byr3 }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Diterima &nbsp;</td>
                        <td>:</td>
                        <td> Rp.
                            <input type="number" name="jumlah" id="" required value="{{ $data->jumlah }}"> ,-
                        </td>
                    </tr>
                    <tr>
                        <td>Terbilang &nbsp;</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="terbilang" id="" required value="{{ $data->terbilang }}">
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
                        <input type="text" name="penerima" id="" required value="{{ $data->penerima }}">
                    </font>
                </center>
            </div>
        </div>
        <br>
        <div class="col-12">
            <center>
                <font size="3">
                    *** Terimakasih ***
                    <br>
                    Ket ADMIN
                </font>
            </center>
        </div>
        <hr>
        <div class="my-2">
            <center>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Kirim</button>
            </center>
        </div>
    </form>
@endsection
