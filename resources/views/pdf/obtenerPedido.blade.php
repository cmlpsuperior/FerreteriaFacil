<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Imprimir Pedido</title>
	<style type= "text/css">
		@page { margin: 1px 25px 1px 10px; }
		table{
		   border-collapse: collapse; width: 100%;
		}
		
		td, th{
		    padding:1px;
		    text-align: left;
		}

		thead{
		   width:100%;
		   position:fixed;
		   height:109px;
		}

		h1, h3, h4{
			text-align: center;
		}
		#moneda{
			text-align: right;
		}
		p{
			margin: 1px 0px 1px 0px;
		}
		
		img {
		  margin: 1px 1px 1px 60px;
		}
		
	</style>

</head>	
<body>
	
	<img class="center" src="img/logo.jpg" />
	
	
	<h1>Ferretería Espinoza</h1>
	<h4>De: Edgar Espinoza Castañeda</h4>
	
	<h4>Pedido N° {{ $pedido->idPedido }}</h4>
	
	<p><strong>Fecha:</strong> {{ $pedido->fechaRegistro}}</p>
	<p><strong>Cliente:</strong> {{ $pedido->cliente->apellidoPaterno }} {{ $pedido->cliente->apellidoMaterno }}, {{ $pedido->cliente->nombres }}</p>	
	<p><strong>Dirección:</strong> {{ $pedido->direccion}}, @if ($pedido->zona!= null) {{ $pedido->zona->nombre}} @else - @endif</p>
	<br>
	<table >
        <thead>
         	<tr>
         		<th>Cant</th>
                <th>Uni</th>
                <th>Material</th>				                
                <th id="moneda">PU</th>
                <th id="moneda">Subtotal</th>
            </tr>
        </thead>

        <tbody>

        	@foreach ($pedido->articulos as $articulo)
            <tr>
	            <td>{{ $articulo->pivot->cantidad }}</td>
	            <td>{{ substr ( $articulo->unidadMedida->nombre,0,3) }}</td>
	            <td>{{ $articulo->nombre }}</td>
	            <td id="moneda">{{ number_format($articulo->pivot->precioUnitario, 1, '.'," ")  }}</td>
	            <td id="moneda">{{ number_format($articulo->pivot->cantidad*$articulo->pivot->precioUnitario, 1, '.'," ") }}</td>
	        </tr> 
	        @endforeach

        </tbody>
    </table>
	<br>

    <h3>Monto: S/ {{ number_format($pedido->montoTotal, 1, '.'," ") }}</h3>
	<h4>Deuda: S/ {{ number_format($pedido->montoTotal - $pedido->montoPagado, 1, '.'," ") }}</h4>

</body>
</html>>