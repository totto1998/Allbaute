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

    Route::get('/panel', [App\Http\Controllers\PanelController::class, 'index'])->name('panel.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::resource('roles',RolController::class);
    Route::resource('user',userController::class);
    Route::resource('proveedor',proveedorController::class);
    Route::resource('ordenCompra',ordenCompraController::class);
    Route::resource('insumos',insumosController::class);
    Route::resource('parametrizacion',parametrizacionController::class);
    Route::resource('tipoParametrizacion',tipoParametrizacionController::class);


    Route::post('/insumos', [InsumosController::class, 'store'])->name('insumos.store');



    Route::put('parametrizacion/{id}', 'parametrizacionController@update')->name('parametrizacion.update');

    Route::get('/parametrizacion/{id}/edit', [parametrizacionController::class, 'edit'])->name('parametrizacion.edit');
    Route::put('/parametrizacion/{id}', [parametrizacionController::class, 'update'])->name('parametrizacion.update');
    // Route::delete('/parametrizacion/{id}', [parametrizacionController::class, 'destroy'])->name('parametrizacion.destroy');

    Route::delete('/parametrizacion/{id}/destroy', [App\Http\Controllers\parametrizacionController::class, 'destroy'])->name('parametrizacion.destroy');






    

});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
