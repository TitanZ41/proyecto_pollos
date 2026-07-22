<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\DetallePedidosController;
use App\Http\Controllers\InventariosController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/empleados', App\Http\Controllers\EmpleadosController::class);
Route::resource('/asistencias', App\Http\Controllers\AsistenciasController::class);
Route::resource('/detalle_pedidos', App\Http\Controllers\DetallePedidosController::class);
Route::resource('/inventarios', App\Http\Controllers\InventariosController::class);
