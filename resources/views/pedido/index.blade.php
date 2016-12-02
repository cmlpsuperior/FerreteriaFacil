@extends ('base')
@section ('contenido')


<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Mantenimiento de pedidos</h5>
	    </div>
	 </div>

	<div class= "row">
		<div class="col s12 m12 l12">
            <div class="card">

            	<div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Lista de pedidos</span> 
            	
	                <ul class="right">
		              <li>
		              	<a href="{{ url('pedido/create')}}" class="waves-effect waves-light" >
		              		<i class="material-icons white-text">add</i>
		              	</a>
		              </li>
		            </ul>
                	  	                         
                </div>

            	<div class="card-content">
					<table class= "bordered highlight">
				        <thead>
				         	<tr>	 
				         		<th data-field="codigo">Código</th> 
				         		<th data-field="cliente">Cliente</th>               
				                <th data-field="zona">Zona</th>

				                <th data-field="productos">N° productos</th>
				                <th data-field="montoTotal">Monto total S/</th>
				                <th data-field="estado">Estado</th>	   
				            </tr>
				        </thead>

				        <tbody>

				        	@foreach ($pedidos as $pedido)
					            <tr>
					            	<td>{{ $pedido->idPedido }}</td>
					            	<td>{{ $pedido->cliente->apellidoPaterno }} {{ $pedido->cliente->apellidoMaterno }}, {{ $pedido->cliente->nombres }} </td>			            
						            <td>@if ($pedido->idZona != null) {{ $pedido->zona->nombre }}@endif</td>

						            <td>{{ count($pedido->articulos) }}</td>
						            <td>{{ $pedido->montoTotal }}</td>
						            <td>{{ $pedido->estado}}</td>
						        </tr> 
					        @endforeach

				        </tbody>
				    </table>
		
					{{ $pedidos->links() }} <!--Esto sirve para paginar. No estoy seguro si funciona para el framework-->
				</div>
			</div>
		</div>
	</div>

</div>
<br>
@endsection

@section ('scriptcontenido')
<script>  
    

    $(document).ready(function() {        

     	// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    	$('.modal').modal();

  	});
  
  
</script>

@endsection