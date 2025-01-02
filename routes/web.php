<?php

use App\Models\SertifikatKomputer;
use Illuminate\Support\Facades\Route;
use App\Models\SertifikatBahasaInggris;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\KuitansiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MengemudiController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\VideoFotoController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\PemrogramanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DesainGrafisController;
use App\Http\Controllers\BahasaInggrisController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\SertifikatKomputerController;
use App\Http\Controllers\SertifikatMengemudiController;
use App\Http\Controllers\SertifikatVideoFotoController;
use App\Http\Controllers\SertifikatPemrogramanController;
use App\Http\Controllers\SertifikatDesainGrafisController;
use App\Http\Controllers\SertifikatBahasaInggrisController;
use App\Http\Controllers\SertifikatDigitalMarketingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/daftar_mengemudi', [MengemudiController::class, 'create'])->middleware('guest');
Route::post('/tambah-mengemudi', [MengemudiController::class, 'store'])->middleware('guest');
Route::get('/data_mengemudi', [MengemudiController::class, 'index'])->middleware('auth');
Route::get('/data_mengemudi/filter', [MengemudiController::class, 'filterData'])->middleware('auth');
Route::post('/data_mengemudi/export', [MengemudiController::class, 'export'])->middleware('auth');
Route::get('/edit_mengemudi/{id}', [MengemudiController::class, 'edit'])->middleware('auth');
Route::put('/update-mengemudi/{id}', [MengemudiController::class, 'update'])->middleware('auth');
Route::get('/hapus_mengemudi/{id}', [MengemudiController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-mengemudi/{id}', [MengemudiController::class, 'destroy'])->middleware('auth');
Route::get('/data_mengemudi/terhapus', [MengemudiController::class, 'deletedMengemudi'])->middleware('auth');
Route::get('/restore-mengemudi/{id}', [MengemudiController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_mengemudi/{id}', [MengemudiController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-mengemudi/{id}', [MengemudiController::class, 'forceDelete'])->middleware('auth');

Route::get('/daftar_desain_grafis', [DesainGrafisController::class, 'create'])->middleware('guest');
Route::post('/tambah-desain_grafis', [DesainGrafisController::class, 'store'])->middleware('guest');
Route::get('/data_desain_grafis', [DesainGrafisController::class, 'index'])->middleware('auth');
Route::get('/data_desain_grafis/filter', [DesainGrafisController::class, 'filterData'])->middleware('auth');
Route::post('/data_desain_grafis/export', [DesainGrafisController::class, 'export'])->middleware('auth');
Route::get('/edit_desain_grafis/{id}', [DesainGrafisController::class, 'edit'])->middleware('auth');
Route::put('/update-desain_grafis/{id}', [DesainGrafisController::class, 'update'])->middleware('auth');
Route::get('/hapus_desain_grafis/{id}', [DesainGrafisController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-desain_grafis/{id}', [DesainGrafisController::class, 'destroy'])->middleware('auth');
Route::get('/data_desain_grafis/terhapus', [DesainGrafisController::class, 'deletedDesainGrafis'])->middleware('auth');
Route::get('/restore-desain_grafis/{id}', [DesainGrafisController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_desain_grafis/{id}', [DesainGrafisController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-desain_grafis/{id}', [DesainGrafisController::class, 'forceDelete'])->middleware('auth');

Route::get('/daftar_bahasa_inggris', [BahasaInggrisController::class, 'create'])->middleware('guest');
Route::post('/tambah-bahasa_inggris', [BahasaInggrisController::class, 'store'])->middleware('guest');
Route::get('/data_bahasa_inggris', [BahasaInggrisController::class, 'index'])->middleware('auth');
Route::get('/data_bahasa_inggris/filter', [BahasaInggrisController::class, 'filterData'])->middleware('auth');
Route::post('/data_bahasa_inggris/export', [BahasaInggrisController::class, 'export'])->middleware('auth');
Route::get('/edit_bahasa_inggris/{id}', [BahasaInggrisController::class, 'edit'])->middleware('auth');
Route::put('/update-bahasa_inggris/{id}', [BahasaInggrisController::class, 'update'])->middleware('auth');
Route::get('/hapus_bahasa_inggris/{id}', [BahasaInggrisController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-bahasa_inggris/{id}', [BahasaInggrisController::class, 'destroy'])->middleware('auth');
Route::get('/data_bahasa_inggris/terhapus', [BahasaInggrisController::class, 'deletedBahasaInggris'])->middleware('auth');
Route::get('/restore-bahasa_inggris/{id}', [BahasaInggrisController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_bahasa_inggris/{id}', [BahasaInggrisController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-bahasa_inggris/{id}', [BahasaInggrisController::class, 'forceDelete'])->middleware('auth');

Route::get('/daftar_komputer', [KomputerController::class, 'create'])->middleware('guest');
Route::post('/tambah-komputer', [KomputerController::class, 'store'])->middleware('guest');
Route::get('/data_komputer', [KomputerController::class, 'index'])->middleware('auth');
Route::get('/data_komputer/filter', [KomputerController::class, 'filterData'])->middleware('auth');
Route::post('/data_komputer/export', [KomputerController::class, 'export'])->middleware('auth');
Route::get('/edit_komputer/{id}', [KomputerController::class, 'edit'])->middleware('auth');
Route::put('/update-komputer/{id}', [KomputerController::class, 'update'])->middleware('auth');
Route::get('/hapus_komputer/{id}', [KomputerController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-komputer/{id}', [KomputerController::class, 'destroy'])->middleware('auth');
Route::get('/data_komputer/terhapus', [KomputerController::class, 'deletedKomputer'])->middleware('auth');
Route::get('/restore-komputer/{id}', [KomputerController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_komputer/{id}', [KomputerController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-komputer/{id}', [KomputerController::class, 'forceDelete'])->middleware('auth');

Route::get('daftar_digital_marketing', [DigitalMarketingController::class, 'create'])->middleware('guest');
Route::post('/tambah-digital_marketing', [DigitalMarketingController::class, 'store'])->middleware('guest');
Route::get('/data_digital_marketing', [DigitalMarketingController::class, 'index'])->middleware('auth');
Route::get('/data_digital_marketing/filter', [DigitalMarketingController::class, 'filterData'])->middleware('auth');
Route::post('/data_digital_marketing/export', [DigitalMarketingController::class, 'export'])->middleware('auth');
Route::get('/edit_digital_marketing/{id}', [DigitalMarketingController::class, 'edit'])->middleware('auth');
Route::put('/update-digital_marketing/{id}', [DigitalMarketingController::class, 'update'])->middleware('auth');
Route::get('/hapus_digital_marketing/{id}', [DigitalMarketingController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-digital_marketing/{id}', [DigitalMarketingController::class, 'destroy'])->middleware('auth');
Route::get('/data_digital_marketing/terhapus', [DigitalMarketingController::class, 'deletedDigitalMarketing'])->middleware('auth');
Route::get('/restore-digital_marketing/{id}', [DigitalMarketingController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_digital_marketing/{id}', [DigitalMarketingController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-digital_marketing/{id}', [DigitalMarketingController::class, 'forceDelete'])->middleware('auth');

Route::get('daftar_pemrograman', [PemrogramanController::class, 'create'])->middleware('guest');
Route::post('/tambah-pemrograman', [PemrogramanController::class, 'store'])->middleware('guest');
Route::get('/data_pemrograman', [PemrogramanController::class, 'index'])->middleware('auth');
Route::get('/data_pemrograman/filter', [PemrogramanController::class, 'filterData'])->middleware('auth');
Route::post('/data_pemrograman/export', [PemrogramanController::class, 'export'])->middleware('auth');
Route::get('/edit_pemrograman/{id}', [PemrogramanController::class, 'edit'])->middleware('auth');
Route::put('/update-pemrograman/{id}', [PemrogramanController::class, 'update'])->middleware('auth');
Route::get('/hapus_pemrograman/{id}', [PemrogramanController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-pemrograman/{id}', [PemrogramanController::class, 'destroy'])->middleware('auth');
Route::get('/data_pemrograman/terhapus', [PemrogramanController::class, 'deletedPemrograman'])->middleware('auth');
Route::get('/restore-pemrograman/{id}', [PemrogramanController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_pemrograman/{id}', [PemrogramanController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-pemrograman/{id}', [PemrogramanController::class, 'forceDelete'])->middleware('auth');

Route::get('daftar_video_editing_fotografi', [VideoFotoController::class, 'create'])->middleware('guest');
Route::post('/tambah-video_editing_fotografi', [VideoFotoController::class, 'store'])->middleware('guest');
Route::get('/data_video_editing_fotografi', [VideoFotoController::class, 'index'])->middleware('auth');
Route::get('/data_video_editing_fotografi/filter', [VideoFotoController::class, 'filterData'])->middleware('auth');
Route::post('/data_video_editing_fotografi/export', [VideoFotoController::class, 'export'])->middleware('auth');
Route::get('/edit_video_editing_fotografi/{id}', [VideoFotoController::class, 'edit'])->middleware('auth');
Route::put('/update-video_editing_fotografi/{id}', [VideoFotoController::class, 'update'])->middleware('auth');
Route::get('/hapus_video_editing_fotografi/{id}', [VideoFotoController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-video_editing_fotografi/{id}', [VideoFotoController::class, 'destroy'])->middleware('auth');
Route::get('/data_video_editing_fotografi/terhapus', [VideoFotoController::class, 'deletedVideoFoto'])->middleware('auth');
Route::get('/restore-video_editing_fotografi/{id}', [VideoFotoController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_video_editing_fotografi/{id}', [VideoFotoController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-video_editing_fotografi/{id}', [VideoFotoController::class, 'forceDelete'])->middleware('auth');

Route::get('/pemasukan', [PemasukanController::class, 'index'])->middleware('auth');
Route::get('/pemasukan/tambah', [PemasukanController::class, 'create'])->middleware('auth');
Route::post('/tambah-pemasukan', [PemasukanController::class, 'store'])->middleware('auth');
Route::get('/pemasukan/edit/{id}', [PemasukanController::class, 'edit'])->middleware('auth');
Route::put('/edit-pemasukan/{id}', [PemasukanController::class, 'update'])->middleware('auth');
Route::get('/pemasukan/hapus/{id}', [PemasukanController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-pemasukan/{id}', [PemasukanController::class, 'destroy'])->middleware('auth');
Route::get('/pemasukan/restore', [PemasukanController::class, 'deletedPemasukan'])->middleware('auth');
Route::get('/restore-pemasukan/{id}', [PemasukanController::class, 'restoreData'])->middleware('auth');
Route::get('/pemasukan/hapus_permanen/{id}', [PemasukanController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force_delete-pemasukan/{id}', [PemasukanController::class, 'forceDelete'])->middleware('auth');
Route::post('/pemasukan/export', [PemasukanController::class, 'export'])->middleware('auth');

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->middleware('auth');
Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'create'])->middleware('auth');
Route::post('/tambah-pengeluaran', [PengeluaranController::class, 'store'])->middleware('auth');
Route::get('/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->middleware('auth');
Route::put('/edit-pengeluaran/{id}', [PengeluaranController::class, 'update'])->middleware('auth');
Route::get('/pengeluaran/hapus/{id}', [PengeluaranController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->middleware('auth');
Route::get('/pengeluaran/restore', [PengeluaranController::class, 'deletedPengeluaran'])->middleware('auth');
Route::get('/restore-pengeluaran/{id}', [PengeluaranController::class, 'restoreData'])->middleware('auth');
Route::get('/pengeluaran/hapus_permanen/{id}', [PengeluaranController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force_delete-pengeluaran/{id}', [PengeluaranController::class, 'forceDelete'])->middleware('auth');
Route::post('/pengeluaran/export', [PengeluaranController::class, 'export'])->middleware('auth');

Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::post('/laporan/export', [LaporanController::class, 'export'])->middleware('auth');

Route::get('/kuitansi', [KuitansiController::class, 'index'])->middleware('auth');
Route::get('/kuitansi/tambah/{id}', [KuitansiController::class, 'create'])->middleware('auth');
Route::post('/tambah-kuitansi', [KuitansiController::class, 'store'])->middleware('auth');
Route::get('/kuitansi/edit/{id}', [KuitansiController::class, 'edit'])->middleware('auth');
Route::put('/edit-kuitansi/{id}', [KuitansiController::class, 'update'])->middleware('auth');
Route::get('/kuitansi/cetak/{id}', [KuitansiController::class, 'cetakKuitansi'])->middleware('auth');
Route::get('/kuitansi/hapus/{id}', [KuitansiController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-kuitansi/{id}', [KuitansiController::class, 'destroy'])->middleware('auth');

// Sertifikat Bahasa Inggris
Route::get('/sertifikat/bahasa-inggris', [SertifikatBahasaInggrisController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/bahasa-inggris/{id}', [SertifikatBahasaInggrisController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/bahasa-inggris', [SertifikatBahasaInggrisController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/bahasa-inggris/edit/{id}', [SertifikatBahasaInggrisController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/bahasa-inggris/{id}', [SertifikatBahasaInggrisController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/bahasa-inggris/cetak/{id}/sertifikat', [SertifikatBahasaInggrisController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/bahasa-inggris/cetak/{id}/nilai', [SertifikatBahasaInggrisController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/bahasa-inggris/hapus/{id}', [SertifikatBahasaInggrisController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/bahasa-inggris/{id}', [SertifikatBahasaInggrisController::class, 'destroy'])->middleware('auth');

// Sertifikat Komputer
Route::get('/sertifikat/komputer', [SertifikatKomputerController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/komputer/{id}', [SertifikatKomputerController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/komputer', [SertifikatKomputerController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/komputer/edit/{id}', [SertifikatKomputerController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/komputer/{id}', [SertifikatKomputerController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/komputer/cetak/{id}/sertifikat', [SertifikatKomputerController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/komputer/cetak/{id}/nilai', [SertifikatKomputerController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/komputer/hapus/{id}', [SertifikatKomputerController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/komputer/{id}', [SertifikatKomputerController::class, 'destroy'])->middleware('auth');

// Sertifikat Desain Grafis
Route::get('/sertifikat/desain-grafis', [SertifikatDesainGrafisController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/desain-grafis/{id}', [SertifikatDesainGrafisController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/desain-grafis', [SertifikatDesainGrafisController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/desain-grafis/edit/{id}', [SertifikatDesainGrafisController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/desain-grafis/{id}', [SertifikatDesainGrafisController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/desain-grafis/cetak/{id}/sertifikat', [SertifikatDesainGrafisController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/desain-grafis/cetak/{id}/nilai', [SertifikatDesainGrafisController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/desain-grafis/hapus/{id}', [SertifikatDesainGrafisController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/desain-grafis/{id}', [SertifikatDesainGrafisController::class, 'destroy'])->middleware('auth');

// Sertifikat Digital Marketing
Route::get('/sertifikat/digital-marketing', [SertifikatDigitalMarketingController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/digital-marketing/{id}', [SertifikatDigitalMarketingController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/digital-marketing', [SertifikatDigitalMarketingController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/digital-marketing/edit/{id}', [SertifikatDigitalMarketingController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/digital-marketing/{id}', [SertifikatDigitalMarketingController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/digital-marketing/cetak/{id}/sertifikat', [SertifikatDigitalMarketingController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/digital-marketing/cetak/{id}/nilai', [SertifikatDigitalMarketingController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/digital-marketing/hapus/{id}', [SertifikatDigitalMarketingController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/digital-marketing/{id}', [SertifikatDigitalMarketingController::class, 'destroy'])->middleware('auth');

// Sertifikat Mengemudi
Route::get('/sertifikat/mengemudi', [SertifikatMengemudiController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/mengemudi/{id}', [SertifikatMengemudiController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/mengemudi', [SertifikatMengemudiController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/mengemudi/edit/{id}', [SertifikatMengemudiController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/mengemudi/{id}', [SertifikatMengemudiController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/mengemudi/cetak/{id}/sertifikat', [SertifikatMengemudiController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/mengemudi/cetak/{id}/nilai', [SertifikatMengemudiController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/mengemudi/hapus/{id}', [SertifikatMengemudiController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/mengemudi/{id}', [SertifikatMengemudiController::class, 'destroy'])->middleware('auth');

// Sertifikat Pemrograman
Route::get('/sertifikat/pemrograman', [SertifikatPemrogramanController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/pemrograman/{id}', [SertifikatPemrogramanController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/pemrograman', [SertifikatPemrogramanController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/pemrograman/edit/{id}', [SertifikatPemrogramanController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/pemrograman/{id}', [SertifikatPemrogramanController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/pemrograman/cetak/{id}/sertifikat', [SertifikatPemrogramanController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/pemrograman/cetak/{id}/nilai', [SertifikatPemrogramanController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/pemrograman/hapus/{id}', [SertifikatPemrogramanController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/pemrograman/{id}', [SertifikatPemrogramanController::class, 'destroy'])->middleware('auth');

// Sertifikat Video Editing & Fotografi
Route::get('/sertifikat/video-editing-fotografi', [SertifikatVideoFotoController::class, 'index'])->middleware('auth');
Route::get('/sertifikat/tambah/video-editing-fotografi/{id}', [SertifikatVideoFotoController::class, 'create'])->middleware('auth');
Route::post('/tambah-sertifikat/video-editing-fotografi', [SertifikatVideoFotoController::class, 'store'])->middleware('auth');
Route::get('/sertifikat/video-editing-fotografi/edit/{id}', [SertifikatVideoFotoController::class, 'edit'])->middleware('auth');
Route::put('/edit-sertifikat/video-editing-fotografi/{id}', [SertifikatVideoFotoController::class, 'update'])->middleware('auth');
Route::get('/sertifikat/video-editing-fotografi/cetak/{id}/sertifikat', [SertifikatVideoFotoController::class, 'cetak_sertifikat'])->middleware('auth');
Route::get('/sertifikat/video-editing-fotografi/cetak/{id}/nilai', [SertifikatVideoFotoController::class, 'cetak_nilai'])->middleware('auth');
Route::get('/sertifikat/video-editing-fotografi/hapus/{id}', [SertifikatVideoFotoController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-sertifikat/video-editing-fotografi/{id}', [SertifikatVideoFotoController::class, 'destroy'])->middleware('auth');

// Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('auth');
Route::get('/karyawan/tambah', [KaryawanController::class, 'create'])->middleware('auth');
Route::post('/tambah-karyawan', [KaryawanController::class, 'store'])->middleware('auth');
Route::get('/karyawan/qr-code/{id}', [KaryawanController::class, 'qrCode'])->middleware('auth');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->middleware('auth');
Route::put('/edit-karyawan/{id}', [KaryawanController::class, 'update'])->middleware('auth');
Route::get('/karyawan/hapus/{id}', [KaryawanController::class, 'delete'])->middleware('auth');
Route::delete('/hapus-karyawan/{id}', [KaryawanController::class, 'destroy'])->middleware('auth');

// Presensi
Route::get('/presensi', [PresensiController::class, 'index'])->middleware('auth');
Route::get('scan/{id}', [PresensiController::class, 'scan'])->middleware('auth');
Route::get('/presensi/hapus/{id}', [PresensiController::class, 'destroy'])->middleware('auth');
