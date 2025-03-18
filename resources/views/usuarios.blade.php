@extends('plantilla')

@section('contenido')

    <h2>Usuarios</h2>
    <br>
    <form action="/" method="post">

    <!-- nombre ruta en web.php -->
    USUARIO:<input type="text"><input type="submit" value="Buscar"> <a href="{{route('usuformGuardar')}}">Nuevo Registro </a> <br>
    
    
    </form>

    <br><br>
    
    <table border="4">
        <tr>
            <th>CODIGO</th>
            <th>USUARIO</th>
            <th>PASSWORD</th>
            <th>TIPO</th>
            <th>IMGEN</th>
            
        </tr>
            
        <!-- llenado de tabla-->
        @foreach ($usuarios as $usuario)
        <tr align="center">
            <td>{{ $usuario->id_usuario}}</td> <!-- desde la base de datos -->
            <td>{{ $usuario->usuario}}</td>
            <td>{{ $usuario->password}}</td>
            {{--<td>{{ $usuario ->tipo}}</td> --}}
            @if ($usuario->tipo=='1')
                <td>Empleado</td> 
            @elseif($usuario->tipo=='2')
                <td>Cliente</td>
            @endif
            <td><img src="{{$usuario->imgurl}}" alt="" width="15%" height="15%"></td>
            <td><button><a href="/usuariofromModificar/{{$usuario->id_usuario}}" >Modifcar</a></button></td>
            <td><button> <a href="/usuario_Eliminar/{{$usuario->id_usuario}}"onclick="return confirm('Estas seguro de eliminar?')">Eliminar</a></button></td>
            
            
        </tr>
        
        @endforeach 

        
    </table>

@endsection