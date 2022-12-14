<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
Route::get('user', [AuthController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware'=>'auth:api'], function(){
Route::post('product',[ProductController::class, 'store']);
Route::delete('product/{id}',[ProductController::class, 'destroy']);
Route::get('product',[ProductController::class, 'index']);
});