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
      <h5>Registrar nuevo empleado</h5>
    </div>
  </div>


  <form action="{{ action('EmpleadoController@store')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">

      <div class="col s12 m12 l6">
        <div class="card">
          
          

          <div class="card-content">
            
            <span class="card-title">Datos personales</span>  

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
                <label for="fechaNacimiento">Fecha nacimiento <span class="red-text">*</span></label>
              </div>

              <div class="input-field col s6">
                <input id="email" type="email" class="validate" value="{{ old('correo') }}" name="correo">
                <label for="email" data-error="wrong" data-success="right">Correo</label>
              </div>

            </div>
            
          </div>
        </div>
      </div>

      <div class="col s12 m12 l6">
        <div class="card">
          
          
                                       
          

          <div class="card-content">

            <span class="card-title">Datos laborales</span>   

            <div class="row">

              <div class="input-field col s6">
                <select name="idCargo">                          
                  <option value="">Seleccionar</option>
                  @foreach ($cargos as $cargo)
                  <option value="{{$cargo->idCargo}}" @if ($cargo->idCargo == old('idCargo') ) selected  @endif>{{$cargo->nombre}}</option>
                  @endforeach
                </select>
                <label>Cargo <span class="red-text">*</span></label>
              </div>
        
              <div class="input-field col s6">
                <input id="fechaIngreso" type="date" class="datepicker" value="{{ old('fechaIngreso') }}" name="fechaIngreso">
                <label for="fechaIngreso">Fecha ingreso <span class="red-text">*</span></label>
              </div>

            </div>
              
            <div class="row">
              
              <div class="input-field col s6">
                <input id="licencia" type="text" class="validate" value="{{ old('licencia') }}" name="licencia">
                <label for="licencia" >Licencia de conducir</label>
              </div>
              
            </div>            

          </div>

        </div>

      </div>

    </div>
  

    <!--Los botones del formulario-->
    <div class="row">
      <div class="input-field col s12 right-align">
        <a class="waves-effect waves-light btn blue" href="{{ url('empleado')}}">Cancelar</a>
        <button class="btn blue waves-effect waves-light" type="submit" name="action">Registrar
          <i class="material-icons right">send</i>
        </button>                
      </div>              
    </div> 

  </form>  
  

</div>
        

@stop
