@extends ('base')
@section ('contenido')

<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Mantenimiento de articulos</h5>
	    </div>
	</div>
	
	<div class="row">

        <div class="col s12 m12 l12">
            <div class="card">
                
                <div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Lista de articulos</span> 
            	
	                <ul class="right">
		              <li>
		              	<a href="{{ url('articulo/create')}}" class="waves-effect waves-light" >
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
				         		<th data-field="unidad">Unidad</th>
				                <th data-field="nombre">Nombre</th>
				                <th data-field="precio">Precio S/</th>				                
				                <th data-field="estado">Estado</th>
				                <th data-field="acciones">acciones</th>
				            </tr>
				        </thead>

				        <tbody>

				        	@foreach ($articulos as $articulo)
				            <tr>
					            <td>{{ $articulo->idArticulo}}</td>
					            <td>{{ $articulo->unidadMedida->nombre}}</td>
					            <td>{{ $articulo->nombre }}</td>
					            <td>{{ $articulo->precioBase }}</td>	
					            <td>{{ $articulo->activo }}</td>					            
					            <td>

					            	<a href="{{action('ArticuloController@edit', ['id'=>$articulo->idArticulo])}}" title="Editar"><i class="material-icons">edit</i></a>
					            	<a class="modal-trigger" href="#modal-delete-{{$articulo->idArticulo}}" title="Eliminar"><i class="material-icons">delete</i></a>
					            </td>

					        </tr> 

					        @include('articulo.modalDelete')

					        @endforeach

				        </tbody>
				    </table>
				
					{{ $articulos->links() }} <!--Esto sirve para paginar. No estoy seguro si funciona para el framework-->

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