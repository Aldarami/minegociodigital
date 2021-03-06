<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('/inicio', [InicioController::class, 'inicio'])->middleware('auth');

// Productos
Route::resource('producto', ProductoController::class)->middleware('auth');

// Clientes
Route::resource('cliente', ClienteController::class)->middleware('auth');

// Ventas
Route::resource('venta', VentaController::class)->parameters(['venta' => 'venta'])->middleware('auth');
Route::resource('venta-producto', VentaProductoController::class)->middleware('auth');