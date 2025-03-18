@extends('plantilla')

@section('contenido')
    
    @method("post");
    

    <h2>Usuario Modificar</h2>

    <script>
        function valida_datos(){
            var tipo= document.getElementById('tipo');
            var usu=document.getElementById('usuario').value;
            var pass=document.getElementById('password').value;
            
            if(tipo.value == '0'){
                alert("No has Seleccionado un Tipo");
                
                return false;
            }else if(usu == ''){
                alert("El campo usuario no debe estar vacio");
                return false;
            }else if(pass == ''){
                alert("El campo Password no debe estar vacio");
                return false;
            }
        }
    </script>

    <form action="/usuarioModificar/{{$datos->id_usuario}}" method="POST" onsubmit=" return valida_datos()" enctype="multipart/form-data"> 

        @csrf {{-- Generacion te token --}}
    
        <img src="{{$datos->imgurl}}" alt="" width="20%" height="20%"><br>
        Codigo: <input type="number" name="codigo" id="" value="{{$datos->id_usuario}} @disabled(true)"><br> {{-- @readonly(true) --}}
        Usuario: <input type="text" name="usuario" id="usuario" value="{{$datos->usuario}}"><br>
        Password: <input type="password" name="password" id="password" value="{{$datos->password}}"> <br> 
        Tipo: <select name="tipo" id="tipo">
            <option value="0">Seleccione uno</option>

            @if ($datos->tipo =='1' )
            <option value="1" selected >Empleado</option>
            <option value="2">Cliente</option>

            @elseif($datos->tipo == '2')
            <option value="1" >Empleado</option>
            <option value="2" selected >Cliente</option>
            
            @endif
        </select><br>
        Imagen: <input type="file" name="img" id=""><br><br>

        <input type="submit" value="Modificar">

        
    </form>
    @if (isset($msg)) {{-- isset()  metd para validar existencia de variable true/false--}}

        <span>{{$msg}}</span>
        
    @endif
    
    
    

@endsection