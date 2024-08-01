<?php

use App\Http\Controllers\DesainGrafisController;
use App\Http\Controllers\MengemudiController;
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
});
Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/daftar_mengemudi', [MengemudiController::class, 'create']);
Route::post('/tambah-mengemudi', [MengemudiController::class, 'store']);
Route::get('/data_mengemudi', [MengemudiController::class, 'index']);
Route::get('/edit_mengemudi/{id}', [MengemudiController::class, 'edit']);
Route::put('/update-mengemudi/{id}', [MengemudiController::class, 'update']);
Route::get('/hapus_mengemudi/{id}', [MengemudiController::class, 'delete']);
Route::delete('/destroy-mengemudi/{id}', [MengemudiController::class, 'destroy']);

Route::get('/daftar_digital_marketing', [DesainGrafisController::class, 'create']);
