

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<body>

<section class="content" style="margin-top:15%">
      <div class="container-fluid">
        <div class="row">

          <div class="login-box m-auto ">

            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="text-center">Iniciar <span class="text-primary">Sesión</span></h3>
              </div>

            <form action="{{ url('login') }}"  class="validar" method="POST"> 
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electronico" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                

                  <div class="form-group">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Contraseña" required placeholder="Clave"  value=""  autocomplete="email" autofocus placeholder="Correo electronico">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
             

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Ingresar <i class="fas fa-arrow-right"></i></button>
                  </div>

                  <p class="mt-3 mb-1 text-center">
                    <a href="{{route('password.request')}}">Olvidé mi contraseña</a>
                  </p>


                </div>

                <div clasS="card-footer">

                  <p class="mt-3 mb-1 text-center">
                    <a href="register">Aún no tengo cuenta</a>
                  </p>

                </div>


              </form>
            </div>
            </div>
        </div>
      </div>
    </section>

</body>
</html>


