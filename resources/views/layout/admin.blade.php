<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Elmuna | @yield('title')</title>
    <link rel="icon" href="/asset/img/icon1.png" type="image/x-icon">
    <link href="/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @stack('css')
    <script src="/js/scripts.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/dashboard"><img src="/asset/img/icon1.png" alt="Logo" width="40"
                height="40"> {{ Auth::user()->name }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class='bx bx-menu'></i>
        </button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="/dashboard">
                            <div class="sb-nav-link-icon">
                                <i class='bx bxs-dashboard'></i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#dataPeserta" aria-expanded="false" aria-controls="dataPeserta">
                            <div class="sb-nav-link-icon"><i class='bx bxs-folder'></i></div>
                            Data Peserta Kursus
                            <div class="sb-sidenav-collapse-arrow">
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </a>
                        <div class="collapse" id="dataPeserta" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/data_mengemudi">Kursus Mengemudi</a>
                                <a class="nav-link" href="/data_komputer">Kursus Komputer</a>
                                <a class="nav-link" href="/data_digital_marketing">Kursus Digital Marketing</a>
                                <a href="/data_bahasa_inggris" class="nav-link">Kursus Bahasa Inggris</a>
                                <a href="/data_pemrograman" class="nav-link">Kursus Pemrograman</a>
                                <a href="/data_desain_grafis" class="nav-link">Kursus Desain Grafis</a>
                                <a href="/data_video_editing_fotografi" class="nav-link">
                                    Kursus Video Editing & Fotografi
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#dataRekap" aria-expanded="false" aria-controls="dataRekap">
                            <div class="sb-nav-link-icon"><i class='bx bxs-folder'></i></div>
                            Rekapitulasi
                            <div class="sb-sidenav-collapse-arrow">
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </a>
                        <div class="collapse" id="dataRekap" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/pemasukan">Pemasukan</a>
                                <a class="nav-link" href="/pengeluaran">Pengeluaran</a>
                                <a class="nav-link" href="/laporan">Laporan</a>
                                <a href="/kuitansi" class="nav-link">Kuitansi</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#dataSertifikat" aria-expanded="false" aria-controls="dataSertifikat">
                            <div class="sb-nav-link-icon"><i class='bx bxs-folder'></i></div>
                            Sertifikat
                            <div class="sb-sidenav-collapse-arrow">
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </a>
                        <div class="collapse" id="dataSertifikat" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/sertifikat/bahasa-inggris">Bahasa Inggris</a>
                                <a class="nav-link" href="/sertifikat/komputer">Komputer</a>
                                <a class="nav-link" href="/sertifikat/desain-grafis">Desain Grafis</a>
                                <a class="nav-link" href="/sertifikat/digital-marketing">Digital Marketing</a>
                                <a class="nav-link" href="/sertifikat/mengemudi">Mengemudi</a>
                                <a class="nav-link" href="/sertifikat/pemrograman">Pemrograman</a>
                                <a class="nav-link" href="/sertifikat/video-editing-fotografi">Video Editing &
                                    Fotografi</a>
                            </nav>
                        </div>
                        <a href="/logout" class="nav-link">
                            <div class="sb-nav-link-icon"><i class='bx bx-log-out bx-flip-horizontal'></i></div>
                            Keluar
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 my-3">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Elmuna Kebumen {{ date('Y') }}</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('js')
</body>

</html>
