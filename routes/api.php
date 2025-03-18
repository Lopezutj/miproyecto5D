<?php

use App\Http\Controllers\ControlUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/usuarios',function(){
    return 'Datos obtenidos';
});
;

//Route::post('/usuarioGuardar',[ControlUsuarios::class,'UsuarioGuardar'])->name('guardarUsu');