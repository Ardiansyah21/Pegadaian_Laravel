<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegadaianController;
use App\Http\Controllers\ResponseController;



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


Route::get('/', [PegadaianController::class, 'index'])->name('index');
Route::get('/login', [PegadaianController::class, 'login'])->name('login');
Route::post('/login', [PegadaianController::class, 'auth'])->name('login.auth');
Route::post('/home', [PegadaianController::class, 'store'])->name('dashboard');
Route::get('/logout', [PegadaianController::class, 'logout'])->name('logout');



Route::middleware('islogin','CekRole:petugas')->group(function(){
    Route::get('/data/petugas', [PegadaianController::class, 'datapetugas'])->name('data.petugas');
    Route::get('response/edit/{pegadaian_Id}', [ResponseController::class,'edit'])->name('response.edit');
    Route::patch('response/edit/{pegadaian_Id}', [ResponseController::class,'update'])->name('response.update');

});

Route::middleware('islogin','CekRole:admin')->group(function(){
    Route::get('/data', [PegadaianController::class, 'data'])->name('data');
    Route::delete('/hapus/{id}', [PegadaianController::class, 'destroy'])->name('delete');
    Route::get('/exportpdf', [PegadaianController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/createpdf{id}', [PegadaianController::class, 'createpdf'])->name('create.pdf');
    

});