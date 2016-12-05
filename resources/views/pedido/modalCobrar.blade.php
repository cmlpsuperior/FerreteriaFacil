
<!-- Modal Structure -->
<div id="modalCobrar" class="modal">
  <div class="modal-content">
    <h4>Pago en efectivo</h4>    

    <div class="row">
      <div class="col s6 offset-s3 center">
        <h5 >Monto total</h5>
      </div>
    </div>

    <div class="row">
      <div class="col s6 offset-s3 center">
        <h5 id="montoTotalModal" >S/ 0.00</h5>
      </div>     
    </div> 
    
    <div class="divider"></div>
    <div class="row">
      <div class="col s6 offset-s3 center">
        <h5 >Monto recibido S/</h5>
      </div>
    </div>

    <div class="row">    
      <div class="input-field col s6 offset-s3 center">
        <input id="montoRecibido" type="number" min="0" step="0.01" class="validate" name="montoRecibido">
        <label for="montoRecibido">Monto recibido</label>
      </div>    
    </div>

    <div class="divider"></div>
    <div class="row">
      <div class="col s6 offset-s3 center">
        <h5 >Vuelto</h5>
      </div>
    </div>

    <div class="row">
      <div class="col s6 offset-s3 center">
        <h5 id="vuelto" >S/ 0.00</h5>
      </div>     
    </div>

  </div>

  <br>
  <div class="modal-footer">    
   	<button class="modal-action btn waves-effect waves-blue btn-flat" type="submit" name="action" id="btnGuardar">Registrar
            <i class="material-icons right">send</i>
    </button>
    <a  class="modal-action modal-close waves-effect waves-teal btn-flat">Cancelar</a>
   
  </div>
</div>