<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlProductos extends Controller
{
    //

    //funcion para mostrar los datos en la tabla
    public function vistaProductosList(Request $request){
        $productos= DB::select('select * from productos');
        
        return view('productos',compact('productos'));
    }//end

    //muestra la vista del formulario
    public function vistaProductosGuardar(){
        return view('producto_guardar');
    }

    //registros de datos
    public function ProductoGuardar(Request $request){

        $respuesta=DB::insert('insert into productos(nombre,existencia,precio) values(?,?,?);',[
            $request->nombre,
            $request->existencia,
            $request->precio
        ]);

        if($respuesta == true){
            $productos=DB::select('select * from productos');
            return view('productos',compact('productos'));
        }else{
            return view('producto_guardar');
        }

    }

    public function productoModificar(Request $request,$id){
        $respuesta=DB::update('update productos set nombre=?,existencia=?,precio=? where id=?',[
            $request->nombre,
            $request->existencia,
            $request->precio,
            $id
        ]);

        if($respuesta==true){
            $productos=DB::select('select * from productos');
            return view('productos',data: ['productos'=>$productos,'msg'=>'Producto modificado con exito']);
        }else{
            $productos= DB::select('select * from productos where id=?',[$id]);
            return view('producto_modificar',['productos'=>$productos[0],'msg'=>'No se cambio ningun campo']);
        }
    }


    public function vistaproductoModificar($id){
        $productos=DB::select('select * from productos where id=?',[$id]);
        return view('producto_modificar',['productos'=>$productos[0]]);
    }

    public function eliminarProducto($id){
        $productos=DB::delete('delete from productos where id=? ', [$id]);

        if($productos==true){
            $productos=DB::select('select * from productos');
            return view('productos',['productos'=>$productos,'msg'=> 'Eliminado con exito']);
        }else{
            $productos=DB::select('select * from  productos',[$id]);
            return view('productos',['productos'=>$productos,'msg'=> 'error al eliminar']);
        }
    }

}
