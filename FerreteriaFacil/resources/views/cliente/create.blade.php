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


  <form action="{{ action('ClienteController@store')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">

      <div class="col s12 m12 l6">
        <div class="card">
          
          <div class="card-content blue white-text">
              <span class="card-title">Datos personales</span>                                   
          </div>

          <div class="card-content">
             

            <div class="row">

              <div class="input-field col s6">
                <select name="idTipoDocumento">                          
                  <option value="">Seleccionar</option>
                  @foreach ($tiposDocumentos as $tipoDoc)
                  <option value="{{$tipoDoc->idTipoDocumento}}" @if ($tipoDoc->idTipoDocumento == 1 ) selected  @endif>{{$tipoDoc->nombre}}</option>
                  @endforeach
                </select>
                <label>Documento <span class="red-text">*</span></label>
              </div>
              
              <div class="input-field col s6">
                <input id="dni" type="number" class="validate" required value="{{ old('numeroDocumento') }}" name="numeroDocumento">
                <label for="dni">N° documento <span class="red-text">*</span></label>
              </div>
                          
            </div>

            <br>

            <div class="row">
              
              <div class="input-field col s6">
                <input id="Nombres" type="text" class="validate"  required value="{{ old('nombres') }}" name="nombres">
                <label for="Nombres">Nombres <span class="red-text">*</span></label>
              </div>
                          
            </div>

            <div class="row"> 

              <div class="input-field col s6">
                <input id="ApellidoPaterno" type="text" class="validate" required value="{{ old('apellidoPaterno') }}" name="apellidoPaterno">
                <label for="ApellidoPaterno">Apellido paterno <span class="red-text">*</span></label>
              </div>  

              <div class="input-field col s6">
                <input id="ApellidoMaterno" type="text" class="validate" required value="{{ old('apellidoMaterno') }}" name="apellidoMaterno">
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
                <input id="icon_telephone" type="tel" class="validate" value="{{ old('telefono') }}" name="telefono">
                <label for="icon_telephone">Teléfono</label>
              </div>

              <div class="input-field col s6">
                <input id="email" type="email" class="validate" value="{{ old('correo') }}" name="correo">
                <label for="email" data-error="wrong" data-success="right">Correo</label>
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
                <label>Zona</label>
              </div>    

              <div class="input-field col s6">
                <input id="direccion" type="text" class="validate" value="{{ old('direccion') }}" name="direccion">
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
        <button class="btn blue waves-effect waves-light" type="submit" name="action">Registrar
          <i class="material-icons right">send</i>
        </button>                
      </div>              
    </div> 

  </form>  
  

</div>
        

@stop
