@extends('plantilla')

@section('contenido')


<div>
    <h2>Registrar Pruducto</h2> <br><br>

    <form action="/guardarProducto" method="POST">
        @csrf

        
        Nombre:<input type="text" name="nombre"id=""><br>
        Existencia: <input type="number" name="existencia"><br>
        Precio: <input type="number" name="precio"><br>
    
        <input type="submit" value="Guardar">


    </form>

    
</div>



@endsection