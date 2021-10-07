




<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">



 

    <!-- Formulario del login -->
    <div style="height:25%"></div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="login-box m-auto ">

            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="text-center">Recuperar <span class="text-primary">Contraseña</span></h3>
              </div>


                <div class="card-body">
                  <p class="login-box-msg">¿Olvidaste tu contraseña? Digita tu correo y te la enviaremos.</p>
                  <form method="POST" action="{{ route('password.email') }}">
                  @csrf
                    <div class="form-group">
                      <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" class="form-control" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>
                    
                    <div class="row">
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Restablecer contraseña</button>
                      </div>
                    </div>
                  </form>

                  <p class="mt-3 mb-1 text-center">
                    <a href="login">Iniciar Sesión</a>
                  </p>   

                </div>

            </div>
            </div>
        </div>
      </div>
    </section>   
    <!-- /.Formulario del login -->

 


