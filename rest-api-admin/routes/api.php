<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\PaketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::get('sales', [SalesController::class, 'index']);
Route::post('sales', [SalesController::class, 'create']);
Route::put('/sales/{id}', [SalesController::class, 'update']);
Route::delete('/sales/{id}', [SalesController::class, 'destroy']);
Route::get('/sales/{id}', [SalesController::class, 'show']);

Route::get('paket', [PaketController::class, 'index']);
Route::post('paket', [PaketController::class, 'create']);
Route::put('/paket/{id}', [PaketController::class, 'update']);
Route::delete('/paket/{id}', [PaketController::class, 'destroy']);
Route::get('/paket/{id}', [PaketController::class, 'show']);

//Route::middleware('auth:sanctum')->group( function() {
//    Route::resource('sales', SalesController::class);
//});

//Route::middleware('auth:sanctum')->group( function() {
//    Route::resource('paket', PaketController::class);
//});

