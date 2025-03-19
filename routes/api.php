<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PolizaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('cliente/{id}', [ClienteController::class, 'client']);
Route::post('cliente/guardar', [ClienteController::class, 'store']);
Route::delete('cliente/eliminar/{id}', [ClienteController::class, 'destroy']);

Route::get('polizas', [PolizaController::class, 'listAPI']);
Route::get('poliza/{id}', [PolizaController::class, 'poliza']);
Route::post('poliza/guardar', [PolizaController::class, 'saveAPI']);
Route::delete('poliza/eliminar/{id}', [PolizaController::class, 'deleteAPI']);
Route::get('polizaC/{id_cliente}', [PolizaController::class, 'polizaCliente']);

Route::get('tecnicos', [ClienteController::class, 'tecnicos']);
Route::post('tecnico/guardar', [ClienteController::class, 'saveTecnico']);
Route::get('tecnico/{id}', [ClienteController::class, 'client']);

Route::get('facturas', [FacturaController::class, 'listAPI']);
Route::get('factura/{id}', [FacturaController::class, 'factura']);
Route::post('factura/guardar', [FacturaController::class, 'saveAPI']);
Route::delete('factura/eliminar/{id}', [FacturaController::class, 'deleteAPI']);

Route::get('servicios', [ServicioController::class, 'listAPI']);
Route::get('servicio/{id}', [ServicioController::class, 'servicio']);
Route::post('servicio/guardar', [ServicioController::class, 'saveAPI']);
Route::delete('servicio/eliminar/{id}', [ServicioController::class, 'deleteAPI']);
Route::get('serviciossf/{id_cliente}', [ServicioController::class, 'serviciosSF']);