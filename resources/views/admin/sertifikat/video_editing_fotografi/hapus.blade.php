@extends('layout.admin')
@include('fungsi.fungsi_tgl_indo')
@section('title', 'Hapus Sertifikat Video Editing & Fotografi')
@push('css')
    <style>
        /* CSS untuk background gambar */
        .background-custom {
            background-image: url("{{ asset('asset/img/sertifikat.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 210mm;
            width: 297mm;
            /* Atur tinggi sesuai kebutuhan */
        }

        .nomor_serti {
            font-weight: bold;
            font-family: Arial;
            font-size: 16px;
        }

        .diberikan {
            font-family: 'Arial';
            font-size: 21px;
            font-weight: bold;
        }

        .sertifikat tr td {
            font-family: Arial;
            font-weight: bold;
            font-size: 16px;
        }

        .telah {
            /* font-family: 'Monotype Corsiva'; */
            font-family: 'Arial';
            line-height: 3px;
            /* font-style: italic; */
        }

        .mbuh {
            font-family: Arial;
            font-size: 16px;
        }

        .mbuh p {
            margin-bottom: 0;
        }

        .tanda_tangan {
            margin-top: 3px;
            margin-bottom: 5px;
        }

        .nama_direk {
            font-family: 'Times New Roman';
        }

        .direk {
            font-size: 10px;
            margin-top: -5px;
        }

        .foto {
            width: 3cm;
            height: 4cm;
            border: 1px solid black;
        }

        .background-custom-2 {
            /* background-image: url("/sertifikat.jpg"); */
            background-color: grey;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 210mm;
            width: 297mm;
            /* Atur tinggi sesuai kebutuhan */
        }

        .judul {
            font-size: 40px;
            font-weight: bolder;
            font-family: "Times New Roman", Times, serif;
            margin: 0px;
        }

        .keterangan,
        .signature {
            padding: 20px !important;
        }

        .table-container {
            width: 800px !important;
        }

        .table-nama {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 20px !important;
            width: 400px !important;
        }

        .table-nama tr td {
            padding: 5px !important;
        }

        .table-nama .table-nama-class {
            width: 35% !important;
        }

        .table-nama .table-nama-char {
            width: 5% !important;
            text-align: center !important;
        }

        .table-nama .table-nama-value {
            width: 60% !important;
        }

        .table-nilai {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 18px !important;
            width: 800px !important;
        }

        .table-nilai tr td {
            border: 1px black solid !important;
            padding: 5px !important;
            text-align: center;
        }

        .custom-height {
            height: 80px !important;
        }

        .table-nilai .mapel {
            text-align: left !important;
            padding-left: 20px !important;
        }

        .tabel-keterangan {
            font-family: "Times New Roman", Times, serif !important;

        }

        .tabel-keterangan tr td {
            padding: 5px !important;
            border: 0px !important;
        }

        .tanda-tangan {
            font-family: "Times New Roman", Times, serif !important;
        }

        /* Aturan print untuk menjaga background muncul saat dicetak */
        @media print {
            .background-custom {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
@endpush
@section('content')
    <center>
        <h3>Hapus Data Sertifikat</h3>
        <h4>Apakah anda yakin ingin menghapus data dibawah ini?</h4>
        <div class="alert alert-danger col-6 col-md-6 col-sm-6" role="alert">
            <h4><i class='bx bx-error'></i> Data yang dihapus tidak dapat dikembalikan!</h4>
        </div>
    </center>
    <hr>
    <div class="container-fluid background-custom d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 my-0">
                <center>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="mt-1 nomor_serti">No : {{ $data->no_sertifikat }}</p>
                    <p class="my-3 diberikan">Diberikan Kepada :</p>
                    <p>
                    <table class="sertifikat">
                        <tr>
                            <td>Nama</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, tanggal lahir</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->tempat_lahir }}, {{ tgl_indonesia3($data->tanggal_lahir) }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td> &nbsp;:&nbsp; </td>
                            <td>{{ $data->nis }}
                            </td>
                        </tr>
                    </table>
                    </p>
                    <div class="telah">
                        <p>Telah Menyelesaikan Pendidikan Video Editing & Fotografi Program {{ $data->program }}</p>
                        <p>yang diselenggarakan oleh LKP ELMUNA dari tanggal {{ tgl_indonesia3($data->tgl_mulai) }} sampai
                            {{ tgl_indonesia3($data->tgl_selesai) }}
                        </p>
                        <p>dan dinyatakan : LULUS</p>
                    </div>
                </center>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2 foto"></div>
            <div class="col-md-4 mb-5 mbuh">
                <center>
                    <p>Kebumen, {{ tgl_indonesia3(date(now())) }}</p>
                    <p>LKP ELMUNA</p>
                    <img src="/asset/img/barcode.gif" alt="" width="15%" class="tanda_tangan">
                    <p class="nama_direk"><b><u>MUHDORI, A. Md. T., S. Tr. Kom</u></b></p>
                    <p class="direk">DIREKTUR</p>
                </center>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid background-custom-2 d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 my-0">
                <center>
                    <br /><br />
                    <p class="judul">Daftar Nilai Ujian</p>
                </center>
                <table class="layout">
                    <tr>
                        <td colspan="2">
                            <center>
                                <table class="table-nama">
                                    <tr>
                                        <td class="table-nama-class">Nama</td>
                                        <td class="table-nama-char">:</td>
                                        <td class="table-nama-value">{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Induk</td>
                                        <td>:</td>
                                        <td>{{ $data->nis }}</td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">

                            <div class="table-container">
                                <table class="table-nilai">
                                    <tr>
                                        <td class="custom-height custom-width-1">No.</td>
                                        <td class="custom-width-2">
                                            MATA PELAJARAN
                                        </td>
                                        <td class="custom-width-3">NILAI</td>
                                        <td class="custom-width-4">KETERANGAN</td>
                                    </tr>

                                    <tr>
                                        <td>1.</td>
                                        <td class="mapel">{{ $data->mapel1 }}</td>
                                        <td>{{ $data->nilai1 }}</td>
                                        <td>
                                            @if ($data->nilai1 == !null)
                                                @if ($data->nilai1 >= 86)
                                                    Memuaskan
                                                @elseif($data->nilai1 >= 75 && $data->nilai1 <= 85)
                                                    Baik
                                                @elseif($data->nilai1 >= 65 && $data->nilai1 <= 74)
                                                    Cukup
                                                @elseif($data->nilai1 >= 55 && $data->nilai1 <= 64)
                                                    Kurang
                                                @else
                                                    Tidak Lulus
                                                @endif
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2.</td>
                                        <td class="mapel">{{ $data->mapel2 }}</td>
                                        <td>{{ $data->nilai2 }}</td>
                                        <td>
                                            @if ($data->nilai2 == !null)
                                                @if ($data->nilai2 >= 86)
                                                    Memuaskan
                                                @elseif($data->nilai2 >= 75 && $data->nilai2 <= 85)
                                                    Baik
                                                @elseif($data->nilai2 >= 65 && $data->nilai2 <= 74)
                                                    Cukup
                                                @elseif($data->nilai2 >= 55 && $data->nilai2 <= 64)
                                                    Kurang
                                                @else
                                                    Tidak Lulus
                                                @endif
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3.</td>
                                        <td class="mapel">{{ $data->mapel3 }}</td>
                                        <td>{{ $data->nilai3 }}</td>
                                        <td>
                                            @if ($data->nilai3 == !null)
                                                @if ($data->nilai3 >= 86)
                                                    Memuaskan
                                                @elseif($data->nilai3 >= 75 && $data->nilai3 <= 85)
                                                    Baik
                                                @elseif($data->nilai3 >= 65 && $data->nilai3 <= 74)
                                                    Cukup
                                                @elseif($data->nilai3 >= 55 && $data->nilai3 <= 64)
                                                    Kurang
                                                @else
                                                    Tidak Lulus
                                                @endif
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td class="mapel">{{ $data->mapel4 }}</td>
                                        <td>{{ $data->nilai4 }}</td>
                                        <td>
                                            @if ($data->nilai4 == !null)
                                                @if ($data->nilai4 >= 86)
                                                    Memuaskan
                                                @elseif($data->nilai4 >= 75 && $data->nilai4 <= 85)
                                                    Baik
                                                @elseif($data->nilai4 >= 65 && $data->nilai4 <= 74)
                                                    Cukup
                                                @elseif($data->nilai4 >= 55 && $data->nilai4 <= 64)
                                                    Kurang
                                                @else
                                                    Tidak Lulus
                                                @endif
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td class="mapel">{{ $data->mapel5 }}</td>
                                        <td>{{ $data->nilai5 }}</td>
                                        <td>
                                            @if ($data->nilai5 == !null)
                                                @if ($data->nilai5 >= 86)
                                                    Memuaskan
                                                @elseif($data->nilai5 >= 75 && $data->nilai5 <= 85)
                                                    Baik
                                                @elseif($data->nilai5 >= 65 && $data->nilai5 <= 74)
                                                    Cukup
                                                @elseif($data->nilai5 >= 55 && $data->nilai5 <= 64)
                                                    Kurang
                                                @else
                                                    Tidak Lulus
                                                @endif
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 50%" class="keterangan">
                            <table class="tabel-keterangan">
                                <tr>
                                    <td colspan="4">Keterangan</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>86 - 100</td>
                                    <td>=</td>
                                    <td>Memuasakan</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>75 - 85</td>
                                    <td>=</td>
                                    <td>Baik</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>65 - 74</td>
                                    <td>=</td>
                                    <td>Cukup</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>55 - 64</td>
                                    <td>=</td>
                                    <td>Kurang</td>
                                </tr>
                                <tr>
                                    <td>E</td>
                                    <td>0 - 54</td>
                                    <td>=</td>
                                    <td>Tidak Lulus</td>
                                </tr>
                            </table>
                        </td>

                        <td class="signature" style="width: 50%">
                            <div class="tanda-tangan">
                                <center>
                                    <p>
                                        Kebumen, {{ tgl_indonesia3(date(now())) }} <br />
                                        Bagian Akademik
                                    </p>
                                    <img src="/asset/img/tanda_tangan-2.png" alt="" width="50%">
                                    <p>SITI SUGIHATI</p>
                                </center>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="my-2">
        <center>
            <form action="/destroy-sertifikat/video-editing-fotografi/{{ $data->id }}" method="post">
                @method('DELETE')
                @csrf
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </center>
    </div>
@endsection
