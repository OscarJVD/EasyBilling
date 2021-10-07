@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Roles <i class="fas fa-list"></i></h1>
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
        <button class="btn btn-danger text-right" id="add">Roles <i class="fas fa-plus"></i></button>
      </div>
      <!-- /.card-header -->

      <!-- card body -->
      <div class="card-body">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($roles as $role)
            <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->status->name}}</td>
              <td>
                <div class="form-group">
                  <a href="#" class="btn btn-xs btn-info" onclick="edit({{$role->id}})"><i class="fas fa-pen"></i></a>
                  @if($role->status_id == 1)
                  <label class="switch">
                    <input type="checkbox" onclick="updateStatus({{$role->id}})" checked>
                    <span class="slider round"></span>
                  </label>
                  @elseif($role->status_id == 2)
                  <label class="switch">
                    <input type="checkbox" onclick="updateStatus({{$role->id}})">
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
        <h4 class="modal-title">Roles <i class="fas fa-plus"></i></h3>
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
<script src="{{asset('js/models/role.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable()

  });
</script>
@endsection