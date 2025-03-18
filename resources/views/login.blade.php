@extends('plantilla')


@section('contenido')

    <form action="/validaentrada" method="post">

        @csrf

        Usuario :<input type="email" name="usuario" id="" placeholder="Usuario"><br>
        Contraseña :<input type="password" name="password" placeholder="Contraseña"><br>
        <button type="submit" name="Entrar">Entrar</button><br>

        @if (isset($msg))
        <span>{{$msg}}</span>

        @endif

    </form>

@endsection