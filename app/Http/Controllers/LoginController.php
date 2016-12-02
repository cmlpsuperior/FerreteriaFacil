<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregado:
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        
		return view('login.index');  
	}
    
    public function autenticar(Request $request){

        $usuario = $request->get('usuario');
        $contrasenia =  $request->get('contrasenia') ;

        if (Auth::attempt(['usuario' => $usuario, 'password' => $contrasenia])) {
            return redirect()->action('ClienteController@index' );
        }
        return redirect()->action('LoginController@index' )->withInput()->withErrors ('Usuario o contraseña incorrecto');  

    }

    public function logout (){
        Auth::logout();
        return redirect()->action('LoginController@index' );  
    }
}
