<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use agregados por mi
use DB;
use App\Cliente;
use App\TipoDocumento;
use App\Zona;
use App\Empleado;
use App\Articulo;
use App\Pedido;
use App\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
    public function index(){        
    		$pedidos = Pedido::orderBy('idPedido', 'desc')
                        ->simplePaginate(8);
            
            return view('pedido.index', ['pedidos'=>$pedidos]);
    }

    public function create (){

        $zonas= Zona::orderBy('nombre', 'asc')->get();
        $clientes= Cliente::orderBy('apellidoPaterno', 'asc')->orderBy('apellidoMaterno', 'asc')->get();
        $articulos= Articulo::orderBy('nombre', 'asc')->get();

    	return view('pedido.create', ['zonas'=>$zonas, 'clientes'=> $clientes,  'articulos'=>$articulos]);
    }

    public function store (PedidoRequest $request){
        
        //inicio una transaccion
        DB::beginTransaction();
		    $pedido= new Pedido();

	    	//datos generales del pedido
	    	$pedido->fechaRegistro= date("Y-m-d H:i:s");

	    	$pedido->montoTotal= $request->get('montoTotal');
	    	$pedido->montoPagado= $request->get('montoPagado');

	    	if ( $request->get('montoTotal') <= get('montoPagado') )
	        	$pedido->estado= 'Adeuda';
	        else
	        	$pedido->estado= 'Completo';

	        $pedido->direccion = $request->get('direccion');

	        $pedido->idZona= $request->get('idZona');
	    	$pedido->idCliente= $request->get('idCliente');
            $pedido->idEmpleado= Auth::User()->idEmpleado;

	    	$pedido->save();


	    	//obtengo todos los arreglos de mi vista:
	    	$idArticulos= $request->get('idArticulos');
	    	$cantidades= $request->get('cantidades');
	    	$preciosUnitarios= $request->get('preciosUnitarios');	

		    //datos del detalle del pedido:
	    	$contador=0;
	    	$cantidadFilas= count($idArticulos); //cuento cuantas filas tiene el detalle de pedido
	    	while ($contador<$cantidadFilas){
                //inserto en la tabla detallePedido
	    		$pedido->articulos()->attach($idArticulos[$contador], [
									'cantidad'=>$cantidades[$contador],
									'precioUnitario'=>$preciosUnitarios[$contador],
									'monto'=> $preciosUnitarios[$contador]*$cantidad[$contador]
	    							]);

                //siguiente fila
	    		$contador++;
	    	}

		 DB::commit();
        
    	return Redirect('pedido'); //es una URL
    }

    public function show ($id){
        return 'Legue al show porque?'.$id;
    }

     

    //Peticiones AJAX:
    public function confirmarCliente (Request $request){
        $numeroDocumento= $request->get('numeroDocumento');

        $cliente = Cliente::where('numeroDocumento','=',$numeroDocumento.'')->first();

        return response()->json([
                            'cliente' => $cliente                            
                        ]);

    }
    public function buscarArticulos (Request $request){
        $buscarNombre = $request->get('nombre');

        $articulos= null;

        //primero buscamos en nombre
        if ($buscarNombre != ''){
            $articulos =  Articulo::where ('nombre','like','%'.$buscarNombre.'%')
                ->where('activo','=',1)
                ->orderBy('nombre', 'asc')
                ->get();
        }
        
        //si no se ingreso ningun campo, listamos todos los articulos
        else{
            $articulos =  Articulo::where('activo','=',1)
                ->orderBy('nombre', 'asc')
                ->get();
        }

        return response()->json([
                            'Articulos' => $articulos                            
                        ]);
        
    }

    public function buscarClientes (Request $request){
        $buscarNumeroDocumento = $request->get('numeroDocumento');
        $buscarNombre = $request->get('nombre');

        $clientes= null;

        //primero buscamos en nombre
        if ($buscarNombre != ''){
            $clientes =  DB::table('cliente')
                ->join('zona', 'cliente.idZona', '=', 'zona.idZona')

                ->select('cliente.*', 'zona.nombre as nombreZona')

                ->where ('cliente.nombres', 'like', '%'.$buscarNombre.'%')
                ->orWhere('cliente.apellidoPaterno', 'like', '%'.$buscarNombre.'%')
                ->orWhere('cliente.apellidoMaterno', 'like', '%'.$buscarNombre.'%')

                ->orderBy('cliente.apellidoPaterno', 'asc')
                ->get(); 
         
        }
        //luego por documento
        else if ($buscarNumeroDocumento != ''){
            $clientes =  DB::table('cliente')
                ->join('zona', 'cliente.idZona', '=', 'zona.idZona')

                ->select('cliente.*', 'zona.nombre as nombreZona')

                ->where ('numeroDocumento', 'like', '%'.$buscarNumeroDocumento.'%')

                ->orderBy('cliente.apellidoPaterno', 'asc')
                ->get(); 
         
        }
        //si no se ingreso ningun campo, listamos todos los clientes
        else {
            $clientes =  DB::table('cliente')
                ->join('zona', 'cliente.idZona', '=', 'zona.idZona')

                ->select('cliente.*', 'zona.nombre as nombreZona')

                ->orderBy('cliente.apellidoPaterno', 'asc')
                ->get(); 
        }

        return response()->json([
                            'clientes' => $clientes
                            
                        ]);
    }

    
}
