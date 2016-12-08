<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregados:
use App\Zona;
use App\Http\Requests\ZonaRequest;

class ZonaController extends Controller
{
    public function index(){    	
		$zonas = Zona::orderBy('idZona', 'desc')
                  ->simplePaginate(8);         
        return view('zona.index', ['zonas'=>$zonas]);
    }

    public function create (){        
    	return view('zona.create');
    }

    public function store (ZonaRequest $request){
    	$zona= new Zona();
    	//obligatorios
    	$zona->nombre = $request->get('nombre');
    	$zona->montoFlete = $request->get('montoFlete');     
    	$zona->save();

    	return Redirect('zona'); //es una URL*/
    }

    public function show ($id){
        return 'Legue al show';
    	//return view('cliente.show', ["cliente"=>Cliente::findOrFail($id)]);
    }

    public function edit($id){
    	return view('zona.edit', [  'zona'=>Zona::findOrFail($id)  ]);
    }

    public function update (ZonaRequest $request, $id){
    	$zona = Zona::findOrFail($id);
		$zona->nombre = $request->get('nombre');
    	$zona->montoFlete = $request->get('montoFlete');     
    	$zona->save();

        return Redirect('zona');
    }
}
