<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//contralodores 
use App\Http\Controllers\RolController;
use App\Http\Controllers\userController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\ordenCompraController;
use App\Http\Controllers\insumosController;
use App\Http\Controllers\parametrizacionController;

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


// Route::get('orden-compra', [App\Http\Controllers\OrdenCompraController::class, 'mostrarOrdenes'])->name('ordenCompra');
// Route::get('parametrizacion', [App\Http\Controllers\parametrizacionController::class, 'mostrarParametrizacion'])->name('parametrizacion');
// Route::get('insumos', [App\Http\Controllers\insumosController::class, 'mostrarInsumos'])->name('insumos');
// Route::get('proveedor', [App\Http\Controllers\proveedorController::class, 'mostrarProveedor'])->name('Proveedor');
// Route::get('Rol', [App\Http\Controllers\RolController::class, 'index'])->name('Rol');
// Route::get('user', [App\Http\Controllers\RolController::class, 'index'])->name('user');




Route::group(['middleware' => 'auth'], function() {

    Route::resource('roles',RolController::class);
    Route::resource('user',userController::class);
    Route::resource('proveedor',proveedorController::class);
    Route::resource('orden-compra',ordenCompraController::class);
    Route::resource('insumos',insumosController::class);
    Route::resource('parametrizacion',parametrizacionController::class);

});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
