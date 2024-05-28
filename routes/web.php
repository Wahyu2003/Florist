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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/shop', function () {
//     return view('shop');
// });
Route::get('/about', function () {
    return view('about');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/combine', function () {
//     return view('combine');
// });

Route::get('/',[PlantsController::class, 'landing']);
Route::get('/combine',[PlantsController::class, 'combine']);
Route::get('/shop',[PlantsController::class, 'shoppage']);

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
    Route::get('/konfirmasi-pesanan',[OrderController::class, 'konfirmationOrders']);
    Route::get('/konfirmasi-pesanan/{id}',[OrderController::class, 'confirmOrder']);
    Route::get('/hapus-pesanan/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
});


//ROUTE TABLE PLANTS
// Route::get('/plants',[PlantsController::class, 'index']);
// Route::get('/plants/tambah',[PlantsController::class, 'tambah']);
// Route::post('/plants/store',[PlantsController::class, 'store']);
// Route::get('/plants/edit/{id}',[PlantsController::class, 'edit']);
// Route::post('/plants/update/{id}',[PlantsController::class, 'update']);
// Route::get('/plants/hapus/{id}',[PlantsController::class, 'hapus']);

// //ROUTE TABLE USERS
// Route::get('/users',[UsersController::class, 'index']);
// Route::get('/users/destroy/{id}',[UsersController::class, 'destroy']);

// // ROUTE TABLE ADMIN
// Route::prefix('admin')->name('admin.')->group(function () {
//     // Routes for authentication
//     Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//     // Protected routes
//     Route::middleware('auth.admin')->group(function () {
//         Route::get('/', [AdminController::class, 'index'])->name('index');
//         Route::get('tambah', [AdminController::class, 'tambah'])->name('tambah');
//         Route::post('store', [AdminController::class, 'store'])->name('store');
//         Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
//         Route::post('update', [AdminController::class, 'update'])->name('update');
//         Route::get('hapus/{id}', [AdminController::class, 'hapus'])->name('hapus');
//         Route::get('dashboard', function () {
//             return view('admin.dashboard');
//         })->name('dashboard');
//     });
// // });

// //ROUTE ORDER
// Route::get('/laporan-penjualan',[OrderController::class, 'showCompletedOrders']);
// Route::get('/konfirmasi-pesanan',[OrderController::class, 'konfirmationOrders']);
// Route::get('/konfirmasi-pesanan/{id}',[OrderController::class, 'confirmOrder']);
// Route::get('/hapus-pesanan/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');


// Route::get('/pegawai',[PegawaiController::class, 'index']);
// Route::get('/pegawai/cari',[PegawaiController::class, 'cari']);