<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaInggrisController;
use App\Http\Controllers\DesainGrafisController;
use App\Http\Controllers\DigitalMarketingController;
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

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('guest');
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/daftar_mengemudi', [MengemudiController::class, 'create']);
Route::post('/tambah-mengemudi', [MengemudiController::class, 'store']);
Route::get('/data_mengemudi', [MengemudiController::class, 'index']);
Route::get('/edit_mengemudi/{id}', [MengemudiController::class, 'edit']);
Route::put('/update-mengemudi/{id}', [MengemudiController::class, 'update']);
Route::get('/hapus_mengemudi/{id}', [MengemudiController::class, 'delete']);
Route::delete('/destroy-mengemudi/{id}', [MengemudiController::class, 'destroy']);
Route::get('/data_mengemudi/terhapus', [MengemudiController::class, 'deletedMengemudi']);
Route::get('/restore-mengemudi/{id}', [MengemudiController::class, 'restoreData']);
Route::get('/hapus_permanen_mengemudi/{id}', [MengemudiController::class, 'deletePermanen']);
Route::delete('/force-delete-mengemudi/{id}', [MengemudiController::class, 'forceDelete']);

Route::get('/daftar_desain_grafis', [DesainGrafisController::class, 'create']);
Route::post('/tambah-desain_grafis', [DesainGrafisController::class, 'store']);
Route::get('/data_desain_grafis', [DesainGrafisController::class, 'index']);
Route::get('/edit_desain_grafis/{id}', [DesainGrafisController::class, 'edit']);
Route::put('/update-desain_grafis/{id}', [DesainGrafisController::class, 'update']);
Route::get('/hapus_desain_grafis/{id}', [DesainGrafisController::class, 'delete']);
Route::delete('/destroy-desain_grafis/{id}', [DesainGrafisController::class, 'destroy']);
Route::get('/data_desain_grafis/terhapus', [DesainGrafisController::class, 'deletedDesainGrafis']);
Route::get('/restore-desain_grafis/{id}', [DesainGrafisController::class, 'restoreData']);
Route::get('/hapus_permanen_desain_grafis/{id}', [DesainGrafisController::class, 'deletePermanen']);
Route::delete('/force-delete-desain_grafis/{id}', [DesainGrafisController::class, 'forceDelete']);

Route::get('/daftar_bahasa_inggris', [BahasaInggrisController::class, 'create']);
Route::post('/tambah-bahasa_inggris', [BahasaInggrisController::class, 'store']);
Route::get('/data_bahasa_inggris', [BahasaInggrisController::class, 'index']);
Route::get('/edit_bahasa_inggris/{id}', [BahasaInggrisController::class, 'edit']);
Route::put('/update-bahasa_inggris/{id}', [BahasaInggrisController::class, 'update']);
Route::get('/hapus_bahasa_inggris/{id}', [BahasaInggrisController::class, 'delete']);
Route::delete('/destroy-bahasa_inggris/{id}', [BahasaInggrisController::class, 'destroy']);
Route::get('/data_bahasa_inggris/terhapus', [BahasaInggrisController::class, 'deletedBahasaInggris']);
Route::get('/restore-bahasa_inggris/{id}', [BahasaInggrisController::class, 'restoreData']);
Route::get('/hapus_permanen_bahasa_inggris/{id}', [BahasaInggrisController::class, 'deletePermanen']);
Route::delete('/force-delete-bahasa_inggris/{id}', [BahasaInggrisController::class, 'forceDelete']);

Route::get('/daftar_komputer', [KomputerController::class, 'create']);
Route::post('/tambah-komputer', [KomputerController::class, 'store']);
Route::get('/data_komputer', [KomputerController::class, 'index']);
Route::get('/edit_komputer/{id}', [KomputerController::class, 'edit']);
Route::put('/update-komputer/{id}', [KomputerController::class, 'update']);
Route::get('/hapus_komputer/{id}', [KomputerController::class, 'delete']);
Route::delete('/destroy-komputer/{id}', [KomputerController::class, 'destroy']);
Route::get('/data_komputer/terhapus', [KomputerController::class, 'deletedKomputer']);
Route::get('/restore-komputer/{id}', [KomputerController::class, 'restoreData']);
Route::get('/hapus_permanen_komputer/{id}', [KomputerController::class, 'deletePermanen']);
Route::delete('/force-delete-komputer/{id}', [KomputerController::class, 'forceDelete']);

Route::get('daftar_digital_marketing', [DigitalMarketingController::class, 'create']);
Route::post('/tambah-digital_marketing', [DigitalMarketingController::class, 'store']);
Route::get('/data_digital_marketing', [DigitalMarketingController::class, 'index']);
Route::get('/edit_digital_marketing/{id}', [DigitalMarketingController::class, 'edit']);
Route::put('/update-digital_marketing/{id}', [DigitalMarketingController::class, 'update']);
Route::get('/hapus_digital_marketing/{id}', [DigitalMarketingController::class, 'delete']);
Route::delete('/destroy-digital_marketing/{id}', [DigitalMarketingController::class, 'destroy']);
Route::get('/data_digital_marketing/terhapus', [DigitalMarketingController::class, 'deletedDigitalMarketing']);
Route::get('/restore-digital_marketing/{id}', [DigitalMarketingController::class, 'restoreData']);
Route::get('/hapus_permanen_digital_marketing/{id}', [DigitalMarketingController::class, 'deletePermanen']);
Route::delete('/force-delete-digital_marketing/{id}', [DigitalMarketingController::class, 'forceDelete']);

Route::get('daftar_pemrograman', [PemrogramanController::class, 'create']);
Route::post('/tambah-pemrograman', [PemrogramanController::class, 'store']);
Route::get('/data_pemrograman', [PemrogramanController::class, 'index']);
Route::get('/edit_pemrograman/{id}', [PemrogramanController::class, 'edit']);
Route::put('/update-pemrograman/{id}', [PemrogramanController::class, 'update']);
Route::get('/hapus_pemrograman/{id}', [PemrogramanController::class, 'delete']);
Route::delete('/destroy-pemrograman/{id}', [PemrogramanController::class, 'destroy']);
Route::get('/data_pemrograman/terhapus', [PemrogramanController::class, 'deletedPemrograman']);
Route::get('/restore-pemrograman/{id}', [PemrogramanController::class, 'restoreData']);
Route::get('/hapus_permanen_pemrograman/{id}', [PemrogramanController::class, 'deletePermanen']);
Route::delete('/force-delete-pemrograman/{id}', [PemrogramanController::class, 'forceDelete']);

Route::get('daftar_video_editing_fotografi', [VideoFotoController::class, 'create']);
Route::post('/tambah-video_editing_fotografi', [VideoFotoController::class, 'store']);
Route::get('/data_video_editing_fotografi', [VideoFotoController::class, 'index']);
Route::get('/edit_video_editing_fotografi/{id}', [VideoFotoController::class, 'edit']);
Route::put('/update-video_editing_fotografi/{id}', [VideoFotoController::class, 'update']);
Route::get('/hapus_video_editing_fotografi/{id}', [VideoFotoController::class, 'delete']);
Route::delete('/destroy-video_editing_fotografi/{id}', [VideoFotoController::class, 'destroy']);
Route::get('/data_video_editing_fotografi/terhapus', [VideoFotoController::class, 'deletedVideoFoto']);
Route::get('/restore-video_editing_fotografi/{id}', [VideoFotoController::class, 'restoreData']);
Route::get('/hapus_permanen_video_editing_fotografi/{id}', [VideoFotoController::class, 'deletePermanen']);
Route::delete('/force-delete-video_editing_fotografi/{id}', [VideoFotoController::class, 'forceDelete']);
