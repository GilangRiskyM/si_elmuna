@extends('layout.main')
@section('title', 'Elmuna - Program Kursus')
@section('content')
    <center>
        <h1>Selamat Datang di Sistem Pendaftaran Kursus <br>ELMUNA KEBUMEN</h1>
    </center>
    <div class="row mt-4">
        <div class="col-lg-3 mb-3" data-aos="flip-right">
            <div class="card shadow">
                <img src="asset/img/mobil.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Mengemudi</h5>
                            <table>
                                <tr>
                                    <td>1. PAKET MANUAL 1 (Melancarkan)</td>
                                </tr>
                                <tr>
                                    <td>2. PAKET MANUAL 2 (Pemula)</td>
                                </tr>
                                <tr>
                                    <td>3. PAKET MANUAL 3 (Mahir)</td>
                                </tr>
                                <tr>
                                    <td>4. PAKET MATIC 1 (Pemula)</td>
                                </tr>
                                <tr>
                                    <td>5. PAKET MATIC 2 (Mahir)</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_mengemudi" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-left">
            <div class="card shadow">
                <img src="asset/img/programkomputer.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Komputer</h5>
                            <table>
                                <tr>
                                    <td>1. MICROSOFT OFFICE</td>
                                </tr>
                                <tr>
                                    <td>2. DESAIN GRAFIS</td>
                                </tr>
                                <tr>
                                    <td>3. EIDITING VIDEO</td>
                                </tr>
                                <tr>
                                    <td>4. FOTOGRAFI</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_komputer" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-right">
            <div class="card shadow">
                <img src="asset/img/digitalmarketing.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Digital Marketing</h5>
                            <table>
                                <tr>
                                    <td>1. PAKET PEMULA</td>
                                </tr>
                                <tr>
                                    <td>2. PAKET MAHIR</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_digital_marketing" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-left">
            <div class="card shadow">
                <img src="asset/img/bahasainggris.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Bahasa Inggris</h5>
                            <table>
                                <tr>
                                    <td>1. PAKET ELEMENTARY</td>
                                </tr>
                                <tr>
                                    <td>2. PAKET INTERMEDIATE</td>
                                </tr>
                                <tr>
                                    <td>3. PAKET CONVERSATION</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_bahasa_inggris" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-right">
            <div class="card shadow">
                <img src="asset/img/koding.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Pemrograman</h5>
                            <table>
                                <tr>
                                    <td>1. Pemrograman Web Dasar</td>
                                </tr>
                                <tr>
                                    <td>2. Pemrograman Web Laravel</td>
                                </tr>
                                <tr>
                                    <td>3. Javascript Dasar</td>
                                </tr>
                                <tr>
                                    <td>4. Javascript Lanjutan</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_bahasa_inggris" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
