<?php

use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// -----------------------------------------------------------------------------------------------
// middleware
Route::group(['middleware' => ['cors']], function () {
    Route::get('user', [UserController::class, 'index']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::post('user', [UserController::class, 'store']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);
});

Route::group(['middleware' => ['cors']], function () {
    Route::get('type', [TypeController::class, 'index']);
    Route::get('type/{id}', [TypeController::class, 'show']);
    Route::post('type', [TypeController::class, 'store']);
    Route::put('type/{id}', [TypeController::class, 'update']);
    Route::delete('type/{id}', [TypeController::class, 'destroy']);
});

// -----------------------------------------------------------------------------------------------
// prefix
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});

Route::prefix('type')->group(function () {
    Route::get('/', [TypeController::class, 'index']);
    Route::post('/', [TypeController::class, 'store']);
    Route::get('{id}', [TypeController::class, 'show']);
    Route::put('{id}', [TypeController::class, 'update']);
    Route::delete('{id}', [TypeController::class, 'destroy']);
});

// -----------------------------------------------------------------------------------------------
// resource
Route::resource('user', UserController::class);
Route::resource('type', TypeController::class);
