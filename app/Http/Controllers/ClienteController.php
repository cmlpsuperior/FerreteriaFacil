<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use agregados por mi
use App\Cliente;
use App\TipoDocumento;
use App\Zona;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;

class ClienteController extends Controller
{
    public function __construct (){

    }

    public function index(){
    	
		$clientes = Cliente::orderBy('idCliente', 'desc')
                  ->simplePaginate(8); 
        
        return view('cliente.index', ['clientes'=>$clientes]);
    }

    public function create (){

        //obtengo todas las zonas registradas:
        $zonas= Zona::all();
        $tiposDocumentos =  TipoDocumento::all();

    	return view('cliente.create', ['zonas'=>$zonas, 'tiposDocumentos'=>$tiposDocumentos]);
    }

    public function store (ClienteRequest $request){
        
        
    	$cliente= new Cliente();

    	//obligatorios
    	$cliente->nombres=$request->get('nombres');
    	$cliente->apellidoPaterno=$request->get('apellidoPaterno');
    	$cliente->apellidoMaterno=$request->get('apellidoMaterno');    
        $cliente->numeroDocumento=$request->get('numeroDocumento');
        $cliente->idTipoDocumento=$request->get('idTipoDocumento');

        //no obligatorios
        if ( $request->get('fechaNacimiento')!='' ) $cliente->fechaNacimiento = $request->get('fechaNacimiento');
        if ( $request->get('genero')!='' )  $cliente->genero = $request->get('genero');
        if ( $request->get('telefono')!='' )  $cliente->telefono = $request->get('telefono');
        if ( $request->get('correo')!='' ) $cliente->correo = $request->get('correo');
        if ( $request->get('direccion')!='' )  $cliente->direccion = $request->get('direccion');
        if ( $request->get('idZona')!='' )  $cliente->idZona = $request->get('idZona');
     
    	$cliente->save();

    	return Redirect('cliente'); //es una URL*/
    }

    public function show ($id){
        return 'Legue al show';
    	//return view('cliente.show', ["cliente"=>Cliente::findOrFail($id)]);
    }

    public function edit($id){
        $zonas = Zona::all();
        $tiposDocumentos =  TipoDocumento::all();
    	return view('cliente.edit', [  'cliente'=>Cliente::findOrFail($id), 
                                       'zonas'=>$zonas,
                                       'tiposDocumentos'=>$tiposDocumentos]);
    }

    public function update (ClienteUpdateRequest $request, $id){
    	$cliente = Cliente::findOrFail($id);

        //obligatorios
        $cliente->nombres=$request->get('nombres');
        $cliente->apellidoPaterno=$request->get('apellidoPaterno');
        $cliente->apellidoMaterno=$request->get('apellidoMaterno');

        //no obligatorios
        if ( $request->get('fechaNacimiento')!='' ) $cliente->fechaNacimiento = $request->get('fechaNacimiento');
        if ( $request->get('genero')!='' )  $cliente->genero = $request->get('genero');
        if ( $request->get('telefono')!='' )  $cliente->telefono = $request->get('telefono');
        if ( $request->get('correo')!='' ) $cliente->correo = $request->get('correo');
        if ( $request->get('direccion')!='' )  $cliente->direccion = $request->get('direccion');
        if ( $request->get('idZona')!='' )  $cliente->idZona = $request->get('idZona');
      
    	$cliente->save();

        return Redirect('cliente');
    }

}
