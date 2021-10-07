@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sucursales <i class="fas fa-list"></i></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Sucursales</a></li>
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
        <button class="btn btn-danger text-right" id="add">Sucursales <i class="fas fa-plus"></i></button>
      </div>
      <!-- /.card-header -->

      <!-- card body -->
      <div class="card-body">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>NIT</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($shops as $shop)
            <tr>
              <td>{{$shop->id}}</td>
              <td>{{$shop->name}}</td>
              <td>{{$shop->address}}</td>
              <td>{{$shop->email}}</td>
              <td>{{$shop->phone}}</td>
              <td>{{$shop->nit}}</td>
              @if($shop->status->name == "Activo")
                <td><label class="btn-xs btn-success">{{$shop->status->name}}</label></td>
              @else
                <td><label class="btn-xs btn-danger">{{$shop->status->name}}</label></td>
              @endif
              <td>
                <div class="form-group">
                  <a href="#" class="btn btn-xs btn-info" onclick="edit({{$shop->id}})"><i class="fas fa-pen"></i></a>
                  @if($shop->status_id == 1)
                  <label class="switch ml-3">
                    <input type="checkbox" onclick="updateStatus({{$shop->id}})" checked>
                    <span class="slider round"></span>
                  </label>
                  @elseif($shop->status_id == 2)
                  <label class="switch ml-3">
                    <input type="checkbox" onclick="updateStatus({{$shop->id}})">
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
              <th>Dirección</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>NIT</th>
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
        <h4 class="modal-title">Sucursales <i class="fas fa-plus"></i></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
      </div>

      <form action="" class="validar" id="form">

        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digíte el nombre de la sucursal">
            </div>
            <div class="form-group col-md-12">
              <label for="address">Dirección<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Digíte la dirección de la sucursal">
            </div>
            <div class="form-group col-md-12">
              <label for="email">Correo<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Digíte el correo de la sucursal">
            </div>
            <div class="form-group col-md-12">
              <label for="phone">Teléfono<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Digíte el teléfono de la sucursal">
            </div>
            <div class="form-group col-md-12">
              <label for="nit">NIT<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nit" id="nit" placeholder="Digíte el NIT de la sucursal">
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
<script src="{{asset('js/models/shop.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable()

  });
</script>
@endsection