<?php
//importamos los controladores
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\UnidadmedidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/proveedores', 'ProveedorController@index');
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::get('/proveedores/{proveedor_id}',[ProveedorController::class,'show']);
Route::delete('/proveedores/{proveedor_id}',[ProveedorController::class,'destroy']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::put('/proveedores/{proveedor_id}',[ProveedorController::class,'update']);

//rutas para unidades de medida
//Route::post('/unidades',[UnidadmedidaController::class,'store']);


