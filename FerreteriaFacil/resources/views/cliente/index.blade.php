@extends ('base')
@section ('contenido')




<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Mantenimiento de clientes</h5>
	    </div>
	</div>
	
	<div class="row">

        <div class="col s12 m12 l12">
            <div class="card">
                
                <div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Lista de clientes</span> 
            	
	                <ul class="right">
		              <li>
		              	<a href="{{ url('cliente/create')}}" class="waves-effect waves-light" >
		              		<i class="material-icons white-text">add</i>
		              	</a>
		              </li>
		            </ul>
                	  	                         
                </div>

                <div class="card-content">
					<table class= "bordered highlight">
				        <thead>
				         	<tr>
				         		<th data-field="dni">Código</th>
				                <th data-field="dni">Documento</th>
				                <th data-field="nombre">Nombre</th>				                
				                <th data-field="zona">Zona</th>
				                <th data-field="correo">Correo</th>
				                <th data-field="acciones">acciones</th>
				            </tr>
				        </thead>

				        <tbody>

				        	@foreach ($clientes as $cliente)
				            <tr>
					            <td>{{ $cliente->idCliente}}</td>
					            <td>{{ $cliente->numeroDocumento}}</td>
					            <td>{{ $cliente->apellidoPaterno}} {{$cliente->apellidoMaterno}}, {{$cliente->nombres}}</td>
					            <td>@if ($cliente->zona !=null )  {{ $cliente->zona->idZona}} @endif</td>
					            <td>@if ($cliente->correo !=null )  {{ $cliente->correo}} @endif</td>					            
					            <td>
					            	<a href="{{action('ClienteController@edit', ['id'=>$cliente->idCliente])}}" title="Editar"><i class="material-icons">edit</i></a>
					            </td>

					        </tr>   

					        @endforeach

				        </tbody>
				    </table>
					
					{{ $clientes->links() }} <!--Esto sirve para paginar. No estoy seguro si funciona para el framework-->

				</div>
			</div>
		</div>
	</div>


</div>

@endsection