@extends('layout.main')
@section('title', 'Elmuna - Program Kursus')
@push('css')
    <style>
        /* css */
    </style>
@endpush
@section('content')
    <center>
        <h1>Selamat Datang di SISPEN Kursus <br>ELMUNA KEBUMEN</h1>
    </center>
    <div class="row mt-4">
        <div class="col-lg-3 mb-3" data-aos="flip-right">
            <div class="card shadow">
                <img src="/asset/img/mobil.png" class="card-img-top post-img" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Mengemudi</h5>
                            <h5>&nbsp;</h5>
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
                <img src="/asset/img/programkomputer.png" class="card-img-top post-img" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Komputer</h5>
                            <h5>&nbsp;</h5>
                            <table>
                                <tr>
                                    <td>1. MICROSOFT WORD</td>
                                </tr>
                                <tr>
                                    <td>2. MICROSOFT EXCEL</td>
                                </tr>
                                <tr>
                                    <td>3. MICROSOFT POWER POINT</td>
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
                <img src="/asset/img/digitalmarketing.png" class="card-img-top post-img" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Digital Marketing</h5>
                            <h5>&nbsp;</h5>
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
                <img src="/asset/img/bahasainggris.png" class="card-img-top post-img" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Bahasa Inggris</h5>
                            <h5>&nbsp;</h5>
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
                <img src="/asset/img/koding.png" class="card-img-top post-img" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Pemrograman</h5>
                            <h5>&nbsp;</h5>
                            <table>
                                <tr>
                                    <td>1. PEMROGRAMAN WEB DASAR</td>
                                </tr>
                                <tr>
                                    <td>2. PEMROGRAMAN WEB LARAVEL</td>
                                </tr>
                                <tr>
                                    <td>3. JAVASCRIPT DASAR</td>
                                </tr>
                                <tr>
                                    <td>4. JAVASCRIPT LANJUTAN</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <a href="/daftar_pemrograman" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-left">
            <div class="card shadow">
                <img src="/asset/img/desaingrafis.jpg" class="card-img-top post-img" alt="videoediting">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Desain Grafis</h5>
                            <h5>&nbsp;</h5>
                            <table>

                                <tr>
                                    <td>1. COREL DRAW</td>
                                </tr>
                                <tr>
                                    <td>2. ADOBE PHOTOSHOP</td>
                                </tr>
                                <tr>
                                    <td>3. DESAIN CANVA</td>
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
                            <a href="/daftar_desain_grafis" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3" data-aos="flip-left">
            <div class="card shadow">
                <img src="/asset/img/video-editing.jpg" class="card-img-top post-img" alt="videoediting">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Video Editing </h5>
                            <h5>& Fotografi</h5>
                            <table>
                                <tr>
                                    <td>1. VIDEO EDITING</td>
                                </tr>
                                <tr>
                                    <td>2. FOTOGRAFI</td>
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
                            <a href="/daftar_video_editing_fotografi" class="btn btn-primary mt-2">
                                Daftar Sekarang
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
