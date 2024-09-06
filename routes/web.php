<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\KuitansiController;
use App\Http\Controllers\MengemudiController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\VideoFotoController;
use App\Http\Controllers\PemrogramanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DesainGrafisController;
use App\Http\Controllers\BahasaInggrisController;
use App\Http\Controllers\DigitalMarketingController;

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
