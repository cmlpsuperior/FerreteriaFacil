<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>
      <!--Mis stilos-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css')}}"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <meta name="csrf-token" content="{{ csrf_token() }}">
      
    </head>
  
    <body>        
        
      <header>
          <!--La barra superior principal-->
        <nav class="blue darken-2">
          <div class="nav-wrapper container">

            <a href="#" class="brand-logo center">FerreteriaFacil</a>

          </div>


        </nav>
      </header>
        
        
      <main class="blue darken-2 ">
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

        <div class ="row">
            <div class ="col s12 center white-text">
              
              <h2 for="">
            <strong>FerreteriaFacil</strong>
             es la manera más simple de administrar tus ventas. 
              </h2>
            </div>
        </div>
        <div class="row">
        <br>
        <br>
        </div>
             
        <div class="row">
          
        </div>
          <form action="{{ action('LoginController@autenticar')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">

              <div class="col s12 m6 l6 offset-m3 offset-l3">
                <div class="card ">

                  <div class="card-content blue darken-3 white-text center">
                      
                      <span class="card-title ">Iniciar sesión</span>                  
                  </div>

                  <div class="card-content ">

                    <div class="row">   

                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="usuario" type="text" class="validate"  required value="{{ old('usuario') }}" name="usuario">
                        <label for="usuario">Usuario *</label>
                      </div>

                      <div class="input-field col s12"> 
                        <i class="material-icons prefix">phonelink_lock</i>
                        <input id="contrasenia" type="password" class="validate"  required value="{{ old('contrasenia') }}" name="contrasenia">
                        <label for="contrasenia">Contraseña *</label>
                      </div>

                    </div>

                  </div>

                  <div class="card-action center">

                  
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Ingresar
                      <i class="material-icons right">send</i>
                    </button>                
                  
              
                  </div>
                  
                </div>
              </div> <!--Acaba la tarjeta 1-->
              

          </div>
          
          </form>


        </div>
        

      </main>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
      
      
      <script>
        $(document).ready(function() {
           
          $(".dropdown-button").dropdown();
          $(".button-collapse").sideNav();      /*es para que boton de hamburgesa funcione*/
          
          $('select').material_select(); 
          $('.datepicker').pickadate({ /*es para que funcione e datepicker*/
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 200, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-dd'
          });
        
          
        });
      </script>

      @yield('scriptcontenido')
      
    </body>
  </html>