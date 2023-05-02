<?php

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\FreeGiftController;
use App\Http\Controllers\MealFreeGiftController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserVoucherController;

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

    //A route post to web service about storing a client must be protected 
    Route::post('/users', [AuthController::class, 'store']);
    //public route
    //Route::resource('vouchers',VoucherController::class);
    Route::get('/voucherDetail', [UserVoucherController::class, 'index']);
    //web servcie
    Route::post('/voucherDetail', [UserVoucherController::class, 'store']);
    //web servcie
    Route::get('/voucherDetail/{id}', [UserVoucherController::class, 'show']);
    Route::put('/voucherDetail/{id}', [UserVoucherController::class, 'update']);
    Route::get('/users', [AuthController::class, 'index']);
    Route::delete('/userUsedVoucher/{id}', [UserVoucherController::class, 'destroy']);
    Route::get('/memberGift', [GiftController::class, 'index']);
    Route::get('/memberGift/{id}', [GiftController::class, 'show']);
    Route::put('/memberGift/{id}', [GiftController::class, 'update']);

    
});
//Route::resource('vouchers',VoucherController::class);

//testing
Route::get('/freegifts', [FreeGiftController::class, 'index']);
Route::post('/freegifts', [FreeGiftController::class, 'store']);
Route::get('/freegifts/{id}', [FreeGiftController::class, 'show']);
Route::put('/freegifts/{id}', [FreeGiftController::class, 'update']);
Route::delete('/freegifts/{id}', [FreeGiftController::class, 'destroy']);

Route::get('/mealfreegifts', [MealFreeGiftController::class, 'index']);
Route::post('/mealfreegifts', [MealFreeGiftController::class, 'store']);
Route::get('/mealfreegifts/{id}', [MealFreeGiftController::class, 'show']);
Route::put('/mealfreegifts/{id}', [MealFreeGiftController::class, 'update']);
Route::delete('/mealfreegifts/{id}', [MealFreeGiftController::class, 'destroy']);

Route::post('/generateToken', [AuthController::class, 'generateToken']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/vouchers', [VoucherController::class, 'index']);
Route::get('/vouchers/{id}', [VoucherController::class, 'show']);



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
