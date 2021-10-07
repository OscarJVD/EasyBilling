@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuarios <i class="fas fa-list"></i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active">Collapsed Sidebar</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /. titulo de la aplicacion y miga de pan  -->
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- card-header -->
            <div class="card-header">
                <button class="btn btn-danger text-right" id="add">Usuarios <i class="fas fa-plus"></i></button>
            </div>
            <!-- /.card-header -->

            <!-- card body -->
            <div class="card-body">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha de nacimiento</th>
                            <th>Tipo de identificación</th>
                            <th>No. de identificación</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Sucursal</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->date_birth}}</td>
                            <td>{{$user->identification_type}}</td>
                            <td>{{$user->identification_number}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{!empty($user->shop->name) ? $user->shop->name : "No aplica" }}</td>
                            <td>{{$user->role->name}}</td>
                            @if($user->status->name == "Activo")
                              <td><label class="btn-xs btn-success">{{$user->status->name}}</label></td>
                             @else
                              <td><label class="btn-xs btn-danger">{{$user->status->name}}</label></td>
                             @endif
                            <td>
                                <div class="form-group btn-group">
                                    <a href="#" class="btn btn-xs btn-info" onclick="edit({{$user->id}})"><i class="fas fa-pen"></i></a>
                                    @if($user->status_id == 1)
                                    <label class="switch">
                                        <input type="checkbox" onclick="updateStatus({{$user->id}})" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    @elseif($user->status_id == 2)
                                    <label class="switch">
                                        <input type="checkbox" onclick="updateStatus({{$user->id}})">
                                        <span class="slider round"></span>
                                    </label>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha de nacimiento</th>
                            <th>Tipo de identificación</th>
                            <th>No. de identificación</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Rol</th>
                            <th>Sucursal</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card body -->

            <!-- card footer -->
            <div class="card-footer">

            </div>
            <!-- /. card footer -->


        </div>

    </div>
</div>

<!-- modal de nuevo registro -->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h4 class="modal-title">Usuarios <i class="fas fa-plus"></i></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
            </div>

            <form action="" class="validar" id="form">
                <input type="hidden" name="password" id="password" value="12345">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Digíte el nombre de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="surname">Apellidos<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Digíte apellidos">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="date_birth">Fecha de nacimiento<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_birth" id="date_birth" placeholder="Digíte la dirección de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="identification_type">Tipo de identificación<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="identification_type" id="identification_type" placeholder="Digíte la dirección de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="identification_number">No. de identificación<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="identification_number" id="identification_number" placeholder="Digíte la dirección de la sucursal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Correo electrónico<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Digíte la dirección de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="phone">Teléfono<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Digíte el teléfono de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address">Dirección<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Digíte la dirección de la sucursal">
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label>Rol<span class="text-danger">*</span></label>
                                        <select name="role_id" class="form-control" required>
                                            <option>Seleccione...</option>
                                            @foreach($roles as $role)
                                            @if($role->id != 2 && $role->id != 3)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger">Solo si seleccionaste el rol sucursal...</p>
                    <div class="row border-top">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="shop_name">Nombre<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Digíte el nombre de la sucursal">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="shop_email">Correo electrónico<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="shop_email" id="shop_email" placeholder="Digíte la dirección de la sucursal">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="shop_phone">Teléfono<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="shop_phone" id="shop_phone" placeholder="Digíte el teléfono de la sucursal">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="shop_address">Dirección<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="shop_address" id="shop_address" placeholder="Digíte la dirección de la sucursal">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="shop_nit">NIT<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="shop_nit" id="shop_nit" placeholder="Digíte la dirección de la sucursal">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pull-right">
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="send">Guardar <i class="fas fa-save"></i></button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /. modal de nuevo registro -->
@endsection

@section('scripts')
<script src="{{asset('js/models/user.js')}}"></script>
<script>
    $(document).ready(function() {
        datatable()

    });
</script>
@endsection