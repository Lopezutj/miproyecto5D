@extends('plantilla')

@section('contenido')

    <h2>Empleados</h2>
    <br>
    <form action="/" method="post">
    Nombre<input type="text"><br>
    Edad<input type="number"><br>
    Hora<input type="time"><br>
    Fecha<input type="date"><br>
    Email<input type="email"><br>
    Puesto<<input type="text"><br>
    Sueldo<input type="number" ><br>
    Caja<input type="hidden"><br>
    <input type="submit" value="enviar">  
    </form>

    <br><br>
    <table border="4">
        <tr>
            <th>Codigo:</th>
            <th>Nombre:</th>
            <th>Apellido:</th>
            <th>Puesto:</th>
            <th>Sueldo:</th>
        </tr>
    

        @foreach ($datos as $empleados)
        <tr align="center">
            <td>{{ $empleados['codigo']}}</td> <!-- desde la base de datos -->
            <td>{{ $empleados['usuario']}}</td>
            <td>{{$empleados['puesto']}}</td>
            <td>{{ $empleados['puesto']}}</td>
            <td>{{ $empleados['sueldo']}}</td>
        </tr>
        
        @endforeach 
    </table>

@endsection