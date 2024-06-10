<?php
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\TanamanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PlantsController::class, 'landing'])->name('landing');;

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/detail/{id}', [PlantsController::class, 'showDetail']);
Route::get('/plants/detail/{id}', [PlantsController::class, 'getDetail']);

Route::get('/shop/cari', [PlantsController::class, 'cari'])->name('shop.cari');
Route::get('/shop/ajax-cari', [PlantsController::class, 'ajaxCari'])->name('shop.ajaxCari');


Route::middleware('auth:admin')->group(function () {
    //ROUTE TABLE PLANTS
    Route::get('/plants',[PlantsController::class, 'index']);
    Route::get('/plants/tambah',[PlantsController::class, 'tambah']);
    Route::post('/plants/store',[PlantsController::class, 'store']);
    Route::get('/plants/edit/{id}',[PlantsController::class, 'edit']);
    Route::post('/plants/update/{id}',[PlantsController::class, 'update']);
    Route::get('/plants/hapus/{id}',[PlantsController::class, 'hapus']);

    //ROUTE TABLE USERS
    Route::get('/users',[UsersController::class, 'index']);
    Route::get('/users/destroy/{id}',[UsersController::class, 'destroy']);

    // ROUTE TABLE ADMIN
    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('tambah');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin/hapus/{id}', [AdminController::class, 'hapus'])->name('hapus');

    //ROUTE ORDER
    Route::get('/laporan-penjualan', [OrderController::class, 'showCompletedOrders'])->name('laporan.penjualan');
    Route::get('/laporan-penjualan/cetaksemua', [OrderController::class, 'cetakOrders'])->name('laporan.penjualan.cetaksemua');
    Route::get('/laporan-penjualan/cetaksatu/{id}', [OrderController::class, 'cetaksatuOrders'])->name('laporan.penjualan.cetaksatu');
    Route::get('/konfirmasi-pesanan',[OrderController::class, 'konfirmationOrders']);
    Route::get('/konfirmasi-pesanan/{id}',[OrderController::class, 'confirmOrder']);
    Route::get('/hapus-pesanan/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
});