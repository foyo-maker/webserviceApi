<?php

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\publicBankController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\VoucherWebServiceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//protected route
//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/users', [AuthController::class, 'store']);
    Route::get('/voucherDetail', [UserVoucherController::class, 'index']);
    Route::post('/userOwnVoucher', [UserVoucherController::class, 'store']);
    Route::get('/voucherDetail/{id}', [UserVoucherController::class, 'show']);
    Route::put('/voucherDetail/{id}', [UserVoucherController::class, 'update']);
    Route::get('/users', [AuthController::class, 'index']);
    Route::delete('/userUsedVoucher/{id}', [UserVoucherController::class, 'destroy']);
    Route::get('/memberGift', [GiftController::class, 'index']);
    Route::get('/memberGift/{id}', [GiftController::class, 'show']);
    Route::put('/memberGift/{id}', [GiftController::class, 'update']);

    
});
//Route::resource('vouchers',VoucherController::class);


Route::post('/generateToken', [AuthController::class, 'generateToken']);

Route::get('/publicBank', [publicBankController::class, 'index']);
Route::get('/publicBank/{id}', [publicBankController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/voucher', [VoucherWebServiceController::class, 'index']);
Route::get('/vouchers/{id}', [VoucherWebServiceController::class, 'show']);


Route::get('/vouchers', [VoucherController::class, 'index']);
Route::get('/vouchers/search/{name}', [VoucherWebServiceController::class, 'search']);



Route::get('/vouchers/search/{name}', [VoucherController::class, 'search']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/vouchers', [VoucherController::class, 'store']);
    Route::put('/vouchers/{id}', [VoucherController::class, 'update']);
    Route::delete('/vouchers/{id}', [VoucherController::class, 'destroy']);


    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
