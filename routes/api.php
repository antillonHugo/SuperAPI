<?php
//importamos los controladores

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ContactoController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\UnidadmedidaController;
use App\Http\Controllers\Api\EntradaController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/unidades',[UnidadmedidaController::class,'index']);
Route::post('/unidades',[UnidadmedidaController::class,'store']);

//rutas para las categrias
Route::get('/categorias',[CategoriaController::class,'index']);
Route::post('/categorias',[CategoriaController::class,'store']);

//rutas para los productos
Route::get('/producto',[ProductoController::class,'index']);
Route::post('/producto',[ProductoController::class,'store']);
Route::get('/producto/cat/{cod_categoria}',[ProductoController::class,'productosPorCategoria']);//filtro de productos por categoria
Route::get('/producto/prov',[ProductoController::class,'filtrarPorProveedor']);//filtro de productos por proveedor


//rutas para las entradas de los productos
Route::get('/entrada',[EntradaController::class,'index']);
Route::post('/entrada',[EntradaController::class,'store']);

//usuarios
Route::get('/usuario',[UsuarioController::class,'index']);
Route::get('/usuario/all',[UsuarioController::class,'usuariosConContactos']);

//contacto
Route::get('/contacto',[ContactoController::class,'index']);


//post
Route::get('/post',[PostController::class,'index']);
Route::get('/post/{cod_post}',[PostController::class,'show']);
//Route::get('/post/relation/comment',[PostController::class,'mostrarPost_y_sus_comentarios']);
Route::get('/post/relation/commentpostid/{cod_post}',[PostController::class,'mostrarCommentPorPostID']);
Route::get('/post/filter/{cod_post}',[PostController::class,'filtraCommentPorId']);

//comment
Route::get('/comment',[CommentController::class,'index']);
Route::get('/comment/{cod_comment}',[CommentController::class,'show']);
Route::get('/comment/publicacion/{cod_comment}',[CommentController::class,'obtener_publicacion_comentarioId']);



