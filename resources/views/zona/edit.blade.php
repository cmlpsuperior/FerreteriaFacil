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
      <h5>Registrar nueva zona</h5>
    </div>
  </div>


  <form action="{{ action('ZonaController@update', $zona->idZona)}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">

      <div class="col s12 m12 l6 offset-l3">
        <div class="card">
          
          <div class="card-content blue white-text">
              <span class="card-title">Datos</span>                                   
          </div>

          <div class="card-content">
            
            <div class="row"> 

              <div class="input-field col s6">
                <input id="nombre" type="text" class="validate"  required value="{{ $zona->nombre }}" name="nombre">
                <label for="nombre">Nombre <span class="red-text">*</span></label>
              </div>

              <div class="input-field col s6">
                <input id="montoFlete" type="number" min="0" step="0.01" class="validate" required value="{{ $zona->montoFlete }}" name="montoFlete">
                <label for="montoFlete">Monto flete S/ <span class="red-text">*</span></label>
              </div>
                          
            </div>

          </div>

        </div>

      </div>

    </div>
  

    <!--Los botones del formulario-->
    <div class="row">
      <div class="input-field col s12 right-align">
        <a class="waves-effect waves-light btn blue" href="{{ url('zona')}}">Cancelar</a>
        <button class="btn blue waves-effect waves-light" type="submit" name="action">Registrar
          <i class="material-icons right">send</i>
        </button>                
      </div>              
    </div> 

  </form>  
  

</div>
        

@stop
