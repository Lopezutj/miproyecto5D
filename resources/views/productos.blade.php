@extends('plantilla')

@section('contenido')

    <h2>producto</h2>
    <br>

    <form action="/" method="post">
    <!-- nombre ruta en web.php -->
    PRODUCTO:<input type="text"><input type="submit" value="Buscar"> <a href="{{route('formRegistroProducto')}}">Nuevo Registro </a> <br>
    </form>

    <br><br>
    
    <table border="4">
        <tr>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>EXISTENCIA</th>
            <th>PRECIO</th>
        </tr>
            
        <!-- llenado de tabla-->
        @foreach ($productos as $producto)
        <tr align="center">
            <td>{{ $producto ->id}}</td> <!-- desde la base de datos -->
            <td>{{ $producto ->nombre}}</td>
            <td>{{ $producto ->existencia}}</td>
            <td>{{ $producto ->precio}}</td>
            
            <td><button><a href="productoformModificar/{{$producto ->id}}" >Modifcar</a></button></td>
            <td><button> <a href="elimarProducto/{{$producto ->id}}" onclick="return confirm('Estas seguro de eliminar?')">Eliminar</a></button></td>
            
            
        </tr>
        
        @endforeach 

    </table>

@endsection