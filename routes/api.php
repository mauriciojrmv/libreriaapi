<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqu¨ª es donde puedes registrar rutas API para tu aplicaci¨®n.
|
*/

// Ruta para el login. Esta ruta puede mantenerse para generar tokens si es necesario.
Route::post('/login', [AuthController::class, 'login']);

// Rutas API que no requieren autenticaci¨®n
Route::apiResource('users', UserController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('sales', SaleController::class);
Route::apiResource('saledetails', SaleDetailController::class);

// Ruta adicional para obtener detalles de venta por SaleID
Route::get('/saledetails/sale/{saleId}', [SaleDetailController::class, 'getSaleDetailsBySaleId']);

// Ruta opcional para obtener el usuario autenticado si se mantiene la funcionalidad de login
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
