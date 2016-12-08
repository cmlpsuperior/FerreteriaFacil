<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use agregados por mi
use App\Zona;
use App\Articulo;
use App\UnidadMedida;
use App\Http\Requests\ArticuloRequest;
use App\Http\Requests\ArticuloUpdateRequest;

class ArticuloController extends Controller
{
    public function index(){    	
		$articulos = Articulo::orderBy('idArticulo', 'desc')
                  ->simplePaginate(8); 
        
        return view('articulo.index', ['articulos'=>$articulos]);
    }

    public function create (){
        //obtengo todas las zonas registradas:
        $unidadesMedidas =  UnidadMedida::all();

    	return view('articulo.create', ['unidadesMedidas'=>$unidadesMedidas]);
    }

    public function store (ArticuloRequest $request){        
    	$articulo= new Articulo();

    	//obligatorios
    	$articulo->nombre = $request->get('nombre');
    	$articulo->precioBase= $request->get('precioBase');
    	$articulo->activo= 1;
    	$articulo->idUnidadMedida = $request->get('idUnidadMedida');

    	$articulo->save();

    	return Redirect('articulo'); //es una URL*/
    }

    public function show ($id){
        return 'Legue al show';
    }

    public function edit($id){
        $unidadesMedidas = UnidadMedida::all();
    	return view('articulo.edit', [ 'articulo'=>Articulo::findOrFail($id), 
                                       'unidadesMedidas'=>$unidadesMedidas]);
    }

    public function update (ArticuloRequest $request, $id){
    	$articulo = Articulo::findOrFail($id);

        //obligatorios
    	$articulo->nombre = $request->get('nombre');
    	$articulo->precioBase= $request->get('precioBase');
    	$articulo->idUnidadMedida = $request->get('idUnidadMedida');

    	$articulo->save();

        return Redirect('articulo');
    }

    public function destroy ($id){
    	$articulo = Articulo::findOrFail($id);

        $articulo->activo=0;
        $articulo->save();

        return Redirect('articulo');
    }

    public function precioZona ($id){

        $zonas = Zona::orderBy('nombre', 'asc')->get();

        return view('articulo.precioZona', [ 'articulo'=>Articulo::findOrFail($id), 'zonas'=>$zonas  ]); 

    }

    public function precioZona_procesar (Request $request, $id){

    }
}
