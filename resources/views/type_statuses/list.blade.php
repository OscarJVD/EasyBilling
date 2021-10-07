@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tipos de estado <i class="fas fa-list"></i></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos de estado</a></li>
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
        <button class="btn btn-danger text-right" id="add">Tipos de estado <i class="fas fa-plus"></i></button>
      </div>
      <!-- /.card-header -->

      <!-- card body -->
      <div class="card-body">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($type_statuses as $type_status)
            <tr>
              <td>{{$type_status->id}}</td>
              <td>{{$type_status->name}}</td>
            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
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
        <h4 class="modal-title">Tipos de estado <i class="fas fa-plus"></i></h3>
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
<script src="{{asset('js/models/type_status.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable()

  });
</script>
@endsection