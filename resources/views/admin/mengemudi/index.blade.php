@extends('layout.main')
@section('title', 'Elmuna - Program Kursus')
@section('content')
    <center>
        <h1>Selamat Datang di Sistem Pendataan Kursus <br>ELMUNA KEBUMEN</h1>
    </center>
    <div class="row mt-4">
        <div class="col-lg-3 mb-3" data-aos="flip-right">
            <div class="card shadow">
                <img src="asset/img/mobil.png" class="card-img-top post-img" alt="Pemrograman">
                <div class="card-body">
                    <div class="card-text">
                        <center>
                            <h5>Kursus Mengemudi</h5>
                            <a href="/data_mengemudi" class="btn btn-primary mt-2">
                                Lihat Data
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
                            <a href="/data_komputer" class="btn btn-primary mt-2">
                                Lihat Data
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
                            <a href="/data_digital_marketing" class="btn btn-primary mt-2">
                                Lihat Data
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
                            <a href="/data_bahasa_inggris" class="btn btn-primary mt-2">
                                Lihat Data
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
                            <a href="/data_bahasa_inggris" class="btn btn-primary mt-2">
                                Lihat Data
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
