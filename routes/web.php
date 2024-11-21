<?php

use App\Http\Controllers\DasboarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class,'login'])->name('login');

    Route::post('/store/login', [AuthController::class,'storelogin']);

    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/store/register', [AuthController::class,'storeregister']);
});


Route::middleware(['auth'])->group(function() {


    Route::get('/',[DasboarController::class,'index']);

    Route::get('/datakerusakan',[KerusakanController::class,'index']);
    Route::get('/tambahkerusakan',[KerusakanController::class,'create']);
    Route::post('/store/kerusakan',[kerusakanController::class,'store']);
    Route::get('/editkerusakan/{id}',[KerusakanController::class,'edit']);
    Route::post('/updatekerusakan/{id}',[kerusakanController::class,'update']);
    Route::get('/destroy/kerusakan/{id}',[KerusakanController::class,'destroy']);



    Route::get('/profile',[AuthController::class,'profile']);
    Route::get('/logout', [AuthController::class,'logout']);


    Route::get('/user',[UserController::class,'index']);
    Route::get('/tambahuser',[UserController::class,'create']);
    Route::post('/storeUser',[UserController::class,'store']);
    Route::get('/editUser/{id}',[UserController::class,'editUser']);
    Route::post('/update/{id}',[UserController::class,'updateUser']);
    Route::get('/destroy/user/{id}',[UserController::class,'destroy']);

    // EDIT BARANG
    Route::get('/databarang',[BarangController::class,'index']);
    Route::get('/tambahbarang',[BarangController::class,'create']);
    Route::post('/store/barang',[BarangController::class,'store']);
    Route::get('/editbarang/{id}',[BarangController::class,'edit']);
    Route::post('/updatebarang/{id}',[BarangController::class,'updatebarang']);
    Route::get('/destroy/barang/{id}',[BarangController::class,'destroy']);



    // HAPUS PEMINJAMAN
    Route::get('/peminjaman/destroy/{id}',[PeminjamanController::class,'destroy']);
    Route::get('/datapeminjam', [PeminjamanController::class, 'index']);
    Route::get('/tambahpeminjam',[PeminjamanController::class,'create']);
    Route::post('/store/peminjam',[PeminjamanController::class,'store']);
    Route::get('/editpinjamanan/{id}',[PeminjamanController::class,'edit']);
    Route::post('/updatePeminjaman/{id}',[PeminjamanController::class,'updatePeminjaman']);

    // HAPUS BARANG







    // tambah pengecekan


     // HAPUS USER

     // EDIT PEMINJAMAN
});

//Pages User/peminjam











