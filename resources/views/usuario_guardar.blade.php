@extends('plantilla')

@section('contenido')
    
    @method("post");


    <h2>Usuario</h2>


    <form action="/usuarioGuardar" method="POST" enctype="multipart/form-data" > {{-- Necesario para furmularios de datos sencibles --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @csrf {{-- Generacion te token --}} 
    
        Usuario: <input type="text" name="usuario"><br>
        Password: <input type="password" name="password"> <br> 
        Tipo: <select name="tipo" id="">
            <option value="0" disabled>Seleccione uno</option>
            <option value="1">Empleado</option>
            <option value="2">Cliente</option>
        </select><br>
        Imagen: <input type="file" name="img" id=""><br><br>

        <input type="submit" value="Guardar">
    </form>
    


@endsection