<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaInggrisController;
use App\Http\Controllers\DesainGrafisController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\MengemudiController;
use App\Http\Controllers\PemrogramanController;
use App\Http\Controllers\VideoFotoController;
use Illuminate\Support\Facades\Route;

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
Route::get('/edit_video_editing_fotografi/{id}', [VideoFotoController::class, 'edit'])->middleware('auth');
Route::put('/update-video_editing_fotografi/{id}', [VideoFotoController::class, 'update'])->middleware('auth');
Route::get('/hapus_video_editing_fotografi/{id}', [VideoFotoController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-video_editing_fotografi/{id}', [VideoFotoController::class, 'destroy'])->middleware('auth');
Route::get('/data_video_editing_fotografi/terhapus', [VideoFotoController::class, 'deletedVideoFoto'])->middleware('auth');
Route::get('/restore-video_editing_fotografi/{id}', [VideoFotoController::class, 'restoreData'])->middleware('auth');
Route::get('/hapus_permanen_video_editing_fotografi/{id}', [VideoFotoController::class, 'deletePermanen'])->middleware('auth');
Route::delete('/force-delete-video_editing_fotografi/{id}', [VideoFotoController::class, 'forceDelete'])->middleware('auth');
