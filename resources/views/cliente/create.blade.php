@extends ('base')

@section ('contenido')

<!--Contenido del cuerpo-->
<br>
<div class="container">

  <!--Mostrara los errores que se hayan cometido:-->
  @if (count($errors)>0)
  <div class="row">
    <div class="alert col s12">
      <ul>
          @foreach ($errors -> all() as $error)
            <li>{{$error}}</li>
          @endforeach
      </ul>
    </div>            
  </div>
  @endif

  <div class="row">
    <div class="col s12 blue-text">
      <h5>Registrar nuevo cliente</h5>
    </div>
  </div>


  <form action="{{ action('ClienteController@store')}}" method="POST" id="formCliente">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">

      <div class="col s12 m12 l6">
        <div class="card">
          
          <div class="card-content blue white-text">
              <span class="card-title">Datos personales</span>                                   
          </div>

          <div class="card-content">
             

            <div class="row">

              <div class="input-field col s6" >
                <select name="idTipoDocumento" id="idTipoDocumento" class="valid">                          
                  <option value="">Seleccionar</option>
                  @foreach ($tiposDocumentos as $tipoDoc)
                  <option value="{{$tipoDoc->idTipoDocumento}}" @if ($tipoDoc->idTipoDocumento == 1 ) selected  @endif>{{$tipoDoc->nombre}}</option>
                  @endforeach
                </select>
                <label>Documento <span class="red-text">*</span></label>
              </div>
              
              <div class="input-field col s6">
                <input id="dni" type="number"  value="{{ old('numeroDocumento') }}" name="numeroDocumento">
                <label for="dni">N° documento <span class="red-text">*</span></label>
              </div>
                          
            </div>

            <br>

            <div class="row">
              
              <div class="input-field col s6">
                <input id="Nombres" type="text" value="{{ old('nombres') }}" name="nombres">
                <label for="Nombres">Nombres <span class="red-text">*</span></label>
              </div>
                          
            </div>

            <div class="row"> 

              <div class="input-field col s6">
                <input id="ApellidoPaterno" type="text" value="{{ old('apellidoPaterno') }}" name="apellidoPaterno">
                <label for="ApellidoPaterno">Apellido paterno <span class="red-text">*</span></label>
              </div>  

              <div class="input-field col s6">
                <input id="ApellidoMaterno" type="text" value="{{ old('apellidoMaterno') }}" name="apellidoMaterno">
                <label for="ApellidoMaterno">Apellido materno <span class="red-text">*</span></label>
              </div>
              
            </div>
            
            <br>

            <div class="row">              
              <div class="input-field col s6">
                <input id="fechaNacimiento" type="date" class="datepicker" value="{{ old('fechaNacimiento') }}" name="fechaNacimiento">
                <label for="fechaNacimiento">Fecha nacimiento</label>
              </div>
              
              <div class="input-field col s6">
                <select name="genero">                          
                  <option value="">Seleccionar</option>
                  <option value="1">Hombre</option>
                  <option value="2">Mujer</option> 
                </select>
                <label for="genero">Género</label>
              </div> 

            </div>
            
          </div>
        </div>
      </div>

      <div class="col s12 m12 l6">
        <div class="card">
          
          <div class="card-content blue white-text">
            <span class="card-title">Datos de contacto</span>                                
          </div>

          <div class="card-content">
            

            <div class="row">
              <div class="input-field col s6">
                <input id="icon_telephone" type="number"  value="{{ old('telefono') }}" name="telefono">
                <label for="icon_telephone">Teléfono</label>
              </div>

              <div class="input-field col s6">
                <input id="email" type="email"  value="{{ old('correo') }}" name="correo">
                <label for="email" >Correo</label>
              </div>
            </div>
              

            <div class="row">
              <div class="input-field col s6">
                <select name="idZona">                          
                  <option value="">Seleccionar</option>
                  @foreach ($zonas as $zona)
                  <option value="{{$zona->idZona}}" @if ($zona->idZona == old('idZona') ) selected @endif>{{$zona->nombre}}</option>
                  @endforeach
                </select>
                <label for="idZona">Zona</label>
              </div>    

              <div class="input-field col s6">
                <input id="direccion" type="text"  value="{{ old('direccion') }}" name="direccion">
                <label for="direccion">Dirección</label>
              </div>          
            </div>

          </div>

        </div>
      </div>
    </div>
  

    <!--Los botones del formulario-->
    <div class="row">
      <div class="input-field col s12 right-align">
        <a class="waves-effect waves-light btn blue" href="{{ url('cliente')}}">Cancelar</a>
        <button class="btn blue waves-effect waves-light" type="submit" name="action" id="btnRegistrar">Registrar
          <i class="material-icons right">send</i>
        </button>                
      </div>              
    </div> 

  </form>  
  

</div>
        

@stop


@section ('scriptcontenido')
<script>
$(document).ready(function() {

  $('#btnRegistrar').click(function (){
    $('#formCliente').validate({
      rules: {
        idTipoDocumento: 'required',
        nombres: {
          required: true
        },
        apellidoPaterno: {
          required: true
        },
        apellidoMaterno: {
          required: true
        },
        numeroDocumento: {
          required: true,
          minlength: 8
        }

      },
      messages: {
        
        nombres: {
          required: 'Ingrese su nombre'
        },
        apellidoPaterno: {
          required: 'Ingrese su apellido'
        },
        apellidoMaterno: {
          required: 'Ingrese su apellido'
        },
        numeroDocumento: {
          required: 'Ingrese su numero de documento',
          minlength: 'Debe tener al menos 8 digitos'
        }



      }



    });


  });

});
</script>
@stop
