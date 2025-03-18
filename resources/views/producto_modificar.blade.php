@extends('plantilla')

@section('contenido')

<script>
    function valida_datos(){
        var nombre=document.getElementById('nombre').value;
        var existencia=document.getElementById('existencia').value;
        var precio=document.getElementById('precio').value;

        if(nombre==''){
            alert('el campo nombre no debe estar vacio');
            return false;
        }else if(existencia==''){
            alert('el campo existencia no debe estar vacio');
            return false;

        }else if(precio==''){
            alert('el campo precio no debe estar vacio');
            return false;
        }
    }
</script>

<div>
    <h2>Registrar Pruducto</h2> <br><br>

    <form action="/productoModificar/{{$productos->id}}" method="POST" onsubmit="return valida_datos()">
        @csrf
        codigo:<input type="number" name="id" id="" value="{{$productos->id}}"><br>
        Nombre:<input type="text" name="nombre" id="nombre" value="{{$productos->nombre}}"><br>
        Existencia: <input type="number" name="existencia" id="existencia" value="{{$productos->existencia}}"><br>
        Precio: <input type="number" name="precio" id="precio" value="{{$productos->precio}}"><br>
    
        <input type="submit" value="Modificar">


    </form>
    
    @if (isset($msg))
        <span>{{$msg}}</span>
    @endif

    
</div>



@endsection