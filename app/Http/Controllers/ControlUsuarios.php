<?php

namespace App\Http\Controllers;  //ruta de controlador

use GuzzleHttp\Client;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; //base de datos

class ControlUsuarios extends Controller{

    public function vistaUsuarioGuardar(){
        return view('usuario_guardar');
    }//cierre de funcion de usuario guardar

    
    //Request para hacer una peticion al servidor
    public function vistaUsuarios(Request $request){    
        $usuarios= DB::select("select * from usuario; ");
        return view("usuarios",compact('usuarios'));

        /*  return response()->json([
            'usuarios_json'=> $usuarios
        ]); */
        
    }//cierre de funcion de vista usuario


    public function UsuarioGuardar(Request $request){

        $file=$request->file('img'); //guarda documento de img por el name=""
        
        $nombre_imagen=$file->getClientOriginalName(); //guarda el nombre de ruta

        //var_dump($nombre_imagen);

        $ruta_carpeta= 'img/';
        //llena la varible con url de img que se guarda en la ruta img
        $imgurl='http://localhost:8000/'. $ruta_carpeta . $nombre_imagen;

        //guarda la img en la carpeta img
        $almacenar= $request->file('img')->move($ruta_carpeta,$nombre_imagen);

        $respuesta = DB::insert('insert into usuario(usuario,password,tipo,imgurl) values (?,?,?,?);',[
            $request -> usuario,
            $request -> password,
            $request ->tipo,
            $imgurl
            

        ]);

        if($respuesta == true){
            $usuarios = DB::select('select * from usuario;');
            return view('usuarios',compact('usuarios'));
        }else{  
            return view('usuario_guardar');
        }

        
    }

    public function usuarioEliminar($id){

        $datos= DB::select('select imgurl from usuario where id_usuario=?',[$id]);
        
        //var_dump($datos);

        $cadena= explode("/",$datos[0]->imgurl);
        
        $resultado = DB::delete('delete from usuario where id_usuario = ?',[$id]);

        if($resultado == true){
            
            unlink(public_path('img/'.$cadena[4])); //elimina archivo de carpeta unlink
            return view('mensajes',['mensaje'=>'Usuario Eliminado con exito']);
            
        }else{
            return view('usuarios');
        }

    }//cierre de la funcion usuarioEliminar

    public function usuarioModificar(Request $request, $id){

        $datos=DB::select('select imgurl from usuario where id_usuario=?',[$id]); //busca la imgen actual
        $cadena= explode('/',$datos[0]->imgurl); //buscar entre la cadena

        $file=$request->file('img'); 
        $nombre_img=$file->getClientOriginalName();
        $nombre_carpeta='img/'; //name carpeta
        $imgurl='http://localhost:8000/'.$nombre_carpeta.$nombre_img; //campo de base de datos
        $guardar= $request->file('img')->move($nombre_carpeta,$nombre_img); //funcion para mover y guardar

        $resultado=DB::update('update usuario set usuario=?,password=?,tipo=?,imgurl=? where id_usuario=?',
            [$request->usuario,
            $request ->password,
            $request->tipo,
            $imgurl,
            $id],
        );

        if($resultado == true){
            //unlink(public_path('img,/'.$cadena[4]));
            unlink(public_path('img/'.$cadena[4]));
            $mensaje = 'Usuario modificado';
            return view('mensajes',compact('mensaje'));
    
        }else{
            
            $datos = DB::select('select * from usuario  where id_usuario=?',[$id]);
            return view('usuario_modificar',['datos'=>$datos[0],'msg'=>'NO se cambio ningun campo']);
        }

    }

    public function vistaUsuarioModificar($id){
        $datos = DB::select('select * from usuario  where id_usuario=?',[$id]);

        //var_dump($datos);//revisa valor de variable 

        return view('usuario_modificar',["datos" => $datos[0]]);

    }
}