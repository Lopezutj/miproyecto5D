<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class loginAutentificar extends Controller
{
    //
    /* public function vistaLogin(){
        return view('login');
    } */

    /* public function validaEntrada(Request $request){
        //consulta de credenciales
        $datos=DB::select('select * from usuario where usuario = ? and password = ?', [
            $request->usuario,
            $request->password
        ]);
        //var_dump($datos);

        if(!empty($datos)){
            return view('inicio',['entrar'=>true]);
        }else{

            return view('Login',['msg'=>'Credenciales Incorrectas']);
        }
    
        
    } */

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        # code...
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function store(Request $request)
    {
        # code...
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);

        $data = $request->except('confirm-password', 'password');
        $data['password'] = Hash::make($request->password);
        User::create($data);

        $resultado= DB::insert('insert into usuario (usuario,password,tipo) values(?,?,?)',[
            $request->email,
            $request->password,
            2
        ]);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        # code...
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}

