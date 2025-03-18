<?php

//uso del controlador

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControlProductos;
use App\Http\Controllers\ControlUsuarios;
use App\Http\Controllers\ControlVistas;
use App\Http\Controllers\loginAutentificar;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/* Rutas para las vistas */


//uso de ruta del controlador ControlVistas
//Route::get('/producto', [ControlVistas::class, "vistaProducto"])->name("producto"); /* name identificador para el menu */
Route::get('/empleado', [ControlVistas::class, "vistaEmpleado"])->name("empleado")->middleware(['cacheMiddleware','auth']);
Route::get('/cliente', [ControlVistas::class, "vistaCliente"])->name("cliente")->middleware(['cacheMiddleware','auth']);
Route::get('/', [ControlVistas::class, "vistaInicio"])->name("inicio");

//rutas del control para el CRUD de usuarios               
//                   (ruta)                                (nombre de funcion)           (nombre identificador en menu)
Route::get('/usuarios', [ControlUsuarios::class, 'vistaUsuarios'])->name("usuario")->middleware(['cacheMiddleware','auth']);
Route::get('/usuariosGuardar', [ControlUsuarios::class,'vistaUsuarioGuardar'])->middleware(['cacheMiddleware','auth']);
//ruta (/usuarioGuardar) para hacer uso de la funcion insert into para la DB
Route::post('/usuarioGuardar',[ControlUsuarios::class,'UsuarioGuardar'])->middleware(['cacheMiddleware','auth']);
Route::get('/usuario_Eliminar/{id}',[ControlUsuarios::class,'usuarioEliminar'])->middleware(['cacheMiddleware','auth']);
route::get('/usuariofromModificar/{id}', [ControlUsuarios::class,'vistaUsuarioModificar'])->name('cacheMiddleware')->middleware(['cacheMiddleware','auth']);
Route::post('/usuarioModificar/{id}', [ControlUsuarios::class,'usuarioModificar'])->middleware(['cacheMiddleware','auth']);

//ruta del crud de producto
//vistas
Route::get('/productos', [ControlProductos::class,'vistaProductosList'],)->name('producto')->middleware(['cacheMiddleware','auth']);//vista ver
Route::get('/formProducto',[ControlProductos::class,'vistaProductosGuardar'])->name('formRegistroProducto')->middleware(['cacheMiddleware','auth']);//formulario de regitro
Route::post('/guardarProducto',[ControlProductos::class,'ProductoGuardar'])->name('proformGuardar')->middleware(['cacheMiddleware','auth']);
Route::post('/productoModificar/{id}',[ControlProductos::class,'productoModificar'])->name('formModificarProducto')->middleware(['cacheMiddleware','auth']);
Route::get('/productoformModificar/{id}',[ControlProductos::class,'vistaproductoModificar'])->name('productoModificar')->middleware(['cacheMiddleware','auth']);
Route::get('/elimarProducto/{id}',[ControlProductos::class,'eliminarProducto'])->name('eliminarPro')->middleware(['cacheMiddleware','auth']);

//login ruta
/* Route::get('/iniciosesion',[loginAutentificar::class,'vistaLogin'])->name('iniciosesion');//vista
Route::post('/validaentrada',[loginAutentificar::class,'validaEntrada'])->name('validaentrada'); */

/* Route::get('/', function () {
    return view('welcome');
})->middleware('auth'); */

// Login
Route::get('/login', [loginAutentificar::class, 'login'])->name('login');
Route::post('/login', [loginAutentificar::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [loginAutentificar::class, 'register'])->name('auth.register');
Route::post('/register', [loginAutentificar::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [loginAutentificar::class, 'logout'])->name('auth.logout');


