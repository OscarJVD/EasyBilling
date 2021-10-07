

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<body style="margin: 50px">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary"><h3>Usuario <i class="fas fa-plus"></i></h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Rol <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Seleccione...</option>
                                    @foreach ($roles as $role)
                                    @if($role->id != 1 && $role->id != 4 & $role->id != 5)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="proveedor" style="display: none">
                            <hr>
                            <h6>Proveedor</h6>
                            <hr>
                            <div class="form-group row">
                                <label for="provider_name" class="col-md-4 col-form-label text-md-right">Nombre empresa <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="provider_name" type="text" class="form-control @error('provider_name') is-invalid @enderror" name="provider_name" value="{{ old('provider_name') }}" autocomplete="provider_name">

                                    @error('provider_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provider_address" class="col-md-4 col-form-label text-md-right">Direccion empresa<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="provider_address" type="text" class="form-control @error('provider_address') is-invalid @enderror" name="provider_address" value="{{ old('provider_address') }}" autocomplete="provider_address">

                                    @error('provider_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provider_phone" class="col-md-4 col-form-label text-md-right">Teléfono empresa<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="provider_phone" type="text" class="form-control @error('provider_phone') is-invalid @enderror" name="provider_phone" value="{{ old('provider_phone') }}" autocomplete="provider_phone">

                                    @error('provider_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="provider_nit" class="col-md-4 col-form-label text-md-right">NIT mepresa <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="provider_nit" type="text" class="form-control @error('provider_nit') is-invalid @enderror" name="provider_nit" value="{{ old('provider_nit') }}" autocomplete="provider_nit">

                                    @error('provider_nit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="empresa">
                            <hr>
                            <h6>Empresa</h6>
                            <hr>
                            <div class="form-group row">
                                <label for="empresa_name" class="col-md-4 col-form-label text-md-right">Nombre <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_name" type="text" class="form-control @error('empresa_name') is-invalid @enderror" name="empresa_name" value="{{ old('empresa_name') }}" autocomplete="empresa_name">

                                    @error('empresa_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="empresa_email" class="col-md-4 col-form-label text-md-right">Email <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_email" type="email" class="form-control @error('empresa_email') is-invalid @enderror" name="empresa_email" value="{{ old('empresa_email') }}" autocomplete="empresa_email">

                                    @error('empresa_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="empresa_nit" class="col-md-4 col-form-label text-md-right">NIT <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_nit" type="text" class="form-control @error('empresa_nit') is-invalid @enderror" name="empresa_nit" value="{{ old('empresa_nit') }}" autocomplete="empresa_nit">

                                    @error('empresa_nit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="empresa_address" class="col-md-4 col-form-label text-md-right">Dirección <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_address" type="text" class="form-control @error('empresa_address') is-invalid @enderror" name="empresa_address" value="{{ old('empresa_address') }}" autocomplete="empresa_address">

                                    @error('empresa_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="empresa_phone" class="col-md-4 col-form-label text-md-right">Teléfono <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_phone" type="text" class="form-control @error('empresa_phone') is-invalid @enderror" name="empresa_phone" value="{{ old('empresa_phone') }}" autocomplete="empresa_phone">

                                    @error('empresa_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="empresa_years" class="col-md-4 col-form-label text-md-right">Años de experiencia <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="empresa_years" type="text" class="form-control @error('empresa_years') is-invalid @enderror" name="empresa_years" value="{{ old('empresa_years') }}" autocomplete="empresa_years">

                                    @error('empresa_years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4">

                               <button type="submit" class="btn btn-outline-secondary">
                                    Limpiar <i class="fas fa-trash-alt"></i>
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Guardar <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>

