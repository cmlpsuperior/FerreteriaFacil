@extends ('base')
@section ('contenido')

<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Mantenimiento de trabajadores</h5>
	    </div>
	</div>
	
	<div class="row">

        <div class="col s12 m12 l12">
            <div class="card">
                
                <div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Lista de trabajadores</span> 
            	
	                <ul class="right">
		              <li>
		              	<a href="{{ url('empleado/create')}}" class="waves-effect waves-light" >
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
				         		<th data-field="unidad">N° documento</th>
				                <th data-field="nombre">Nombre completo</th>
				                <th data-field="precio">Cargo</th>				                
				                <th data-field="estado">Estado</th>
				                <th data-field="acciones">acciones</th>
				            </tr>
				        </thead>

				        <tbody>

				        	@foreach ($empleados as $empleado)
				            <tr>
					            <td>{{ $empleado->idEmpleado}}</td>
					            <td>{{ $empleado->numeroDocumento }}</td>
					            <td>{{ $empleado->apellidoPaterno }} {{ $empleado->apellidoMaterno }}, {{ $empleado->nombres }}</td>
					            <td>{{ $empleado->cargo->nombre }}</td>	
					            <td>{{ $empleado->estado }}</td>					            
					            <td>

					            	<a href="{{action('EmpleadoController@edit', ['id'=>$empleado->idEmpleado])}}" title="Editar"><i class="material-icons">edit</i></a>
					            	<a class="modal-trigger" href="#modal-delete-{{$empleado->idEmpleado}}" title="Eliminar"><i class="material-icons">delete</i></a>
					            </td>

					        </tr> 

					        @include('empleado.modalDelete')

					        @endforeach

				        </tbody>
				    </table>
				
					{{ $empleados->links() }} <!--Esto sirve para paginar. No estoy seguro si funciona para el framework-->

				</div>
			</div>
		</div>
	</div>


</div>

@endsection

@section ('scriptcontenido')
<script>  
    

    $(document).ready(function() {        

     	// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    	$('.modal').modal();

  	});
  
  
</script>

@endsection