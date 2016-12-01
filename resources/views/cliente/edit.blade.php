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
      <h5>Editar cliente N° {{$cliente->idCliente}}</h5>
    </div>
  </div>

  <form action="{{ action('ClienteController@update', $cliente->idCliente) }}" method="POST">
  <input type="hidden" name="_method" value="PUT">
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
              <select >                          
                <option value="">{{ $cliente->tipoDocumento->nombre }}</option>                
              </select>
              <label>Documento <span class="red-text">*</span></label>
            </div>
            
            <div class="input-field col s6">
              <input id="dni" type="number" class="validate" readonly value="{{ $cliente->numeroDocumento }}" >
              <label for="dni">N° documento <span class="red-text">*</span></label>
            </div>
                        
          </div>

          <br>

          <div class="row">
            
            <div class="input-field col s6">
              <input id="Nombres" type="text" class="validate"  required value="{{ $cliente->nombres }}" name="nombres">
              <label for="Nombres">Nombres <span class="red-text">*</span></label>
            </div>
                        
          </div>

          <div class="row"> 

            <div class="input-field col s6">
              <input id="ApellidoPaterno" type="text" class="validate" required value="{{ $cliente->apellidoPaterno }}" name="apellidoPaterno">
              <label for="ApellidoPaterno">Apellido paterno <span class="red-text">*</span></label>
            </div>  

            <div class="input-field col s6">
              <input id="ApellidoMaterno" type="text" class="validate" required value="{{ $cliente->apellidoMaterno }}" name="apellidoMaterno">
              <label for="ApellidoMaterno">Apellido materno <span class="red-text">*</span></label>
            </div>
            
          </div>


          <br>

          <div class="row">              
            <div class="input-field col s6">
              <input id="fechaNacimiento" type="date" class="datepicker" value="{{ $cliente->fechaNacimiento }}" name="fechaNacimiento">
              <label for="fechaNacimiento">Fecha nacimiento</label>
            </div>
            
            <div class="input-field col s6">
              <select name="genero">                          
                <option value="">Seleccionar</option>
                <option value="1" @if ($cliente->genero == 1 ) selected @endif>Hombre</option>
                <option value="2" @if ($cliente->genero == 2 ) selected @endif>Mujer</option> 
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
              <input id="icon_telephone" type="tel" class="validate" value="{{ $cliente->telefono }}" name="telefono">
              <label for="icon_telephone">Teléfono</label>
            </div>

            <div class="input-field col s6">
              <input id="email" type="email" class="validate" value="{{ $cliente->correo }}" name="correo">
              <label for="email" data-error="wrong" data-success="right">Correo</label>
            </div>
          </div>
            

          <div class="row">
            <div class="input-field col s6">
              <select name="idZona">                          
                <option value="">Seleccionar</option>
                @foreach ($zonas as $zona)
                <option value="{{$zona->idZona}}" @if ($zona->idZona == $cliente->idZona ) selected @endif>{{$zona->nombre}}</option>
                @endforeach
              </select>
              <label>Zona</label>
            </div>    

            <div class="input-field col s6">
              <input id="direccion" type="text" class="validate" value="{{ $cliente->direccion }}" name="direccion">
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
      <a class="waves-effect waves-light btn" href="{{ url('cliente')}}">Cancelar</a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
        <i class="material-icons right">send</i>
      </button>                
    </div>              
  </div>
                    
  </form>  
              
</div>

@stop
