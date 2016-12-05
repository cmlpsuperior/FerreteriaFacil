@extends ('base')
@section ('contenido')

<div class="container">
	<br>
	<div class="row">
	    <div class="col s12 blue-text">
	      <h5>Material: {{ $articulo->nombre }}</h5>
	    </div>
	</div>
	
	<div class="row">

        <div class="col s12 m12 l12">
            <div class="card">
                
                <div class="card-content  blue white-text">                	
                		
                	<span class="card-title">Precios por zona</span> 
            	
	                <ul class="right">
		              <li>
		              	<a id="btnAgregarZona" class="waves-effect waves-light" >
		              		<i class="material-icons white-text">add</i>
		              	</a>
		              </li>
		            </ul>
                	  	                         
                </div>

                <div class="card-content">
					<table class= "bordered highlight" id="tblPrecios">
				        <thead>
				         	<tr>
				         		
				                <th data-field="nombre">Nombre</th>
				                <th data-field="precio">Precio S/</th>
				                <th data-field="acciones">acciones</th>
				            </tr>
				        </thead>

				        <tbody>
				        	@if ($articulo->zonas !=null)
				        	@foreach ($articulo->zonas as $zona)
				            <tr>
					            
					            <td>{{ $zona->nombre}}</td>
					            <td>{{ $zona->precio }}</td>						            
					            <td>

					            </td>

					        </tr> 
					        @endforeach
					        @endif

				        </tbody>
				    </table>
				
				</div>
			</div>
		</div>
	</div>


</div>

@endsection


@section ('scriptcontenido')
<script>  
    

    $(document).ready(function() {        

     	$('#btnAgregarZona').click(function (){
     		$('#tblPrecios').append(
     			'<tr>'+                    
                    '<td> '++'</td>'+
                    '<td> <input type="hidden" value="'+value.idArticulo+'">'+value.nombre+'</td>'+
                    '<td> <div class="col s4"> <input type="number" step="0.01" min="0.01" class="validate" value="'+value.precioBase+'"> </div> </td>'+
                  '</tr>'
                  );
     	});

  	});
  
  
</script>

@endsection