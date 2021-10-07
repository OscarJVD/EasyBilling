@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Estados <i class="fas fa-list"></i></h1>
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
        <button class="btn btn-danger text-right" id="add">Estados <i class="fas fa-plus"></i></button>
      </div>
      <!-- /.card-header -->

      <!-- card body -->
      <div class="card-body">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Tipo de estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($statuses as $status)
            <tr>
              <td>{{$status->id}}</td>
              <td>{{$status->name}}</td>
              <td>{{$status->type_status->name}}</td>
              <td>
                <div class="form-group">
                  <a href="#" class="btn btn-xs btn-info" onclick="edit({{$status->id}})"><i class="fas fa-pen"></i></a>
                  <a href="#" class="btn btn-xs btn-danger mr-1" onclick="del({{$status->id}})"><i class="fas fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Tipo de estado</th>
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
        <h4 class="modal-title">Estados <i class="fas fa-plus"></i></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
      </div>

      <form action="" class="validar" id="form">

        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digíte el nombre del rol">
            </div>
            <div class="form-group col-md-12">
              <label for="type_status_id">Tipo de estado<span class="text-danger">*</span></label>
              <select name="type_status_id" id="type_status_id" class="form-control">
                <option value="">Seleccione un tipo de estado</option>
                @foreach ($type_statuses as $type_status)
                <option value="{{$type_status->id}}">{{$type_status->name}}</option>
                @endforeach
              </select>
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
<script src="{{asset('js/models/status.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable()

  });
</script>
@endsection