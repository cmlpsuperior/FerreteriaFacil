<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

//agregados
use App\Pedido;

class PDFController extends Controller
{
    public function obtenerPedido ($id){
    	$pedido = Pedido::findOrFail ($id);
    	$pdf = PDF::loadView('pdf.obtenerPedido', ['pedido'=>$pedido]);

    	return $pdf->setPaper([0,0,227,842])->stream($id.'pdf'); //se le esta dando esos valores, es: 80X297 convertido a inch, y luego multiplicado por 72dpi
    }
}
