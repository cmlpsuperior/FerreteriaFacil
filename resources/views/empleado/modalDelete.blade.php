
<!-- Modal Structure -->
<div id="modal-delete-{{$empleado->idEmpleado}}" class="modal">
  <div class="modal-content">
    <h4>Eliminar trabajador</h4>
    <p>¿Está seguro que desea eliminar al trabajador?</p>
  </div>
  <div class="modal-footer">
    <form action="{{ action('EmpleadoController@destroy', $empleado->idEmpleado) }}" method="POST">
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   	
   	<button class="modal-action modal-close waves-effect waves-blue blue-text btn-flat" type="submit" name="action">Eliminar</button> 
    <a  class="modal-action modal-close waves-effect waves-blue btn-flat">Cancelar</a>
    
    </form>
  </div>
</div>