<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AsistenciasController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/empleados', App\Http\Controllers\EmpleadosController::class);
Route::resource('/asistencias', App\Http\Controllers\AsistenciasController::class);