<?php
/* Respons
    request
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request; //para peticion el servidor
use Illuminate\Support\Facades\DB; //clase para manejar query ala base de datos




    class ControlVistas extends Controller
{
    //funciones de rutas
/*  public function vistaProducto(){
        
        return view("producto");
    }//cierre de funcion de vistaProducto */

    public function vistaEmpleado(){ 

        $datos=[

            ['codigo'=>1,"usuario"=>"andres","apellido"=>"FLores","puesto"=> "Gerente","sueldo"=>30000],
            ['codigo'=>2,'usuario'=>"ana",'apellido'=>"FLores",'puesto'=> "Supervisor",'sueldo'=>10000],
            ['codigo'=>3,"usuario"=>"agel","apellido"=>"FLores","puesto"=> "Vendedor","sueldo"=>80000],
            
            
        ];

        return view('empleado',compact('datos'));
    }//cierre de funcion de vistaProducto

    public function vistaCliente(){
        
        return view("cliente");
    }//cierre de funcion de vistaProducto

    public function vistaInicio(){
        
        return view("inicio");
    }//cierre de funcion de vistaProducto
    

    

}//cierre de clase controlVista