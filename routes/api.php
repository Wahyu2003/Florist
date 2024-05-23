<?php

use Illuminate\Http\Request;
use App\Http\Controllers\APIOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Api\ApiPenggunaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DetailUserController;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\TanamanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('orders', [APIOrderController::class, 'store']);
// Route::get('orders/{id}', [APIOrderController::class, 'show']);




//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/tanamans', [TanamanController::class, 'index']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // user routes
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/update', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // detail user routes
    Route::get('/detail_users', [DetailUserController::class, 'index']);
    Route::get('/detail_user/{id}', [DetailUserController::class, 'show']);
    Route::post('/detail_user', [DetailUserController::class, 'store']);
    Route::put('/detail_user/{id}', [DetailUserController::class, 'update']);
    Route::delete('/detail_user/{id}', [DetailUserController::class, 'destroy']);

    // routes pesanan
    Route::get('/pesanans', [PesananController::class, 'index']);
    Route::get('/pesanan/{id}', [PesananController::class, 'show']);
    Route::post('/pesanan', [PesananController::class, 'store']);
    Route::delete('/pesanan/{id}', [PesananController::class, 'destroy']);

    // routes tanaman
    Route::get('/tanamans', [TanamanController::class, 'index']);
    Route::get('/tanaman/{id}', [TanamanController::class, 'show']);
    Route::post('/tanaman', [TanamanController::class, 'store']);
   
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

 Route::apiResource( name : '/posts_pengguna', controller: App\Http\Controllers\Api\ApiPenggunaController::class);
// // Route::get('/posts_image', [App\Http\Controllers\Api\ApiPenggunaController::class, "sendImage"])->name('sendImage');
 Route::get('/posts_image', [App\Http\Controllers\Api\ApiPenggunaController::class, "sendImage"])->name('sendImage');

 Route::put('/pesanan/{id}', [ApiPenggunaController::class, 'update']);
