<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ProductoApiController;
use App\Http\Controllers\Api\UserApiController;

/*
|--------------------------------------------------------------------------
| Rutas API
|--------------------------------------------------------------------------
*/

// Ruta de prueba
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Clientes
Route::get('/clientes', [ClienteApiController::class, 'index']);
Route::post('/clientes', [ClienteApiController::class, 'store']);
Route::get('/clientes/{cliente}', [ClienteApiController::class, 'show']);
Route::put('/clientes/{cliente}', [ClienteApiController::class, 'update']);
Route::delete('/clientes/{cliente}', [ClienteApiController::class, 'destroy']);

// Productos
Route::get('/productos', [ProductoApiController::class, 'index']);
Route::post('/productos', [ProductoApiController::class, 'store']);
Route::get('/productos/{producto}', [ProductoApiController::class, 'show']);
Route::put('/productos/{producto}', [ProductoApiController::class, 'update']);
Route::delete('/productos/{producto}', [ProductoApiController::class, 'destroy']);

// Usuarios
Route::get('/usuarios', [UserApiController::class, 'index']);
Route::post('/usuarios', [UserApiController::class, 'store']);
Route::get('/usuarios/{usuario}', [UserApiController::class, 'show']);
Route::put('/usuarios/{usuario}', [UserApiController::class, 'update']);
Route::delete('/usuarios/{usuario}', [UserApiController::class, 'destroy']);
