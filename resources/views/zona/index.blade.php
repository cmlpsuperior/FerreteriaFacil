@extends ('base')
@section ('contenido')




<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Mantenimiento de zonas</h5>
	    </div>
	</div>
	
	<div class="row">

        <div class="col s12 m12 l12">
            <div class="card">
                
                <div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Lista de zonas</span> 
            	
	                <ul class="right">
		              <li>
		              	<a href="{{ url('zona/create')}}" class="waves-effect waves-light" >
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
				                <th data-field="dni">Nombre</th>
				                <th data-field="nombre">Monto de flete S/</th>	
				                <th data-field="acciones">acciones</th>
				            </tr>
				        </thead>

				        <tbody>

				        	@foreach ($zonas as $zona)
				            <tr>
					            <td>{{ $zona->idZona}}</td>
					            <td>{{ $zona->nombre}}</td>
					            <td>{{ $zona->montoFlete}}</td>					            
					            <td>
					            	<a href="{{action('ZonaController@edit', ['id'=>$zona->idZona])}}" title="Editar"><i class="material-icons">edit</i></a>
					            </td>
					        </tr> 
					        @endforeach

				        </tbody>
				    </table>
					
					{{ $zonas->links() }} <!--Esto sirve para paginar. No estoy seguro si funciona para el framework-->

				</div>
			</div>
		</div>
	</div>


</div>

@endsection