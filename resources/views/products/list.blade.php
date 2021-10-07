{{ libxml_use_internal_errors(true) }}
@extends('layouts.admin')

@section('title')
<!-- titulo de la aplicacion y miga de pan  -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Productos <i class="fas fa-list"></i></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
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
      <div class="card-header d-flex">
        <div class="col-md-2">
          <button class="btn btn-danger text-right" id="add">Productos <i class="fas fa-plus"></i></button>
        </div>
        <div class="col-md-10 justify-content-end d-flex">
          <div class="flex-right position-ref full-height">
            <div class="container">
              <form action="{{ route('products.import.excel') }}" method="post" class="d-inline" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                <p>{{ Session::get('message') }}</p>
                @endif


                  <div class="card card-outline card-success col-md-10">
                    <div class="card-header">
                      agregar nuevo archivo <i class="fas fa-file-excel text-success"></i>
                    </div>
                    <div class="card-body">
                       <input type="file" name="file"  multiple>
                       
                       <button type="submit" class="btn btn-success btn-sm mt-1 float-right">Importar</button>
                    </div>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->

      <!-- card body -->
      <div class="card-body">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio de Proveedor</th>
              <th>Precio de Venta</th>
              <th>Existencias</th>
              <th>Iva</th>
              <th>Usuario</th>
              <th>Categoría</th>
              <th>Estado</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody id="table-body">
            @foreach ($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->purchase_price}}</td>
              <td>{{$product->sale_price}}</td>
              
              @if($product->stock <= 10)

              <td><label class="btn-xs btn-danger">{{$product->stock}}</label></td>

              @elseif( $product->stock > 10 && $product->stock <= 20)
                
                <td><label class="btn-xs btn-warning">{{$product->stock}}</label></td>

              @else
                 
                <td><label class="btn-xs btn-success">{{$product->stock}}</label></td>

              @endif

              <td>{{$product->iva}}%</td>
              <td>{{$product->user->name}}</td>
              <td>{{$product->category->name}}</td>
              
              @if( $product->status->name == "Activo")

              <td><label class="btn-xs btn-success">{{$product->status->name}}</label></td>
              
              @else

              <td><label class="btn-xs btn-danger">{{$product->status->name}}</label></td>

              @endif

              <td>
                <div class="form-group">
                  <a href="#" class="btn btn-xs btn-info" onclick="edit({{$product->id}})"><i class="fas fa-pen"></i></a>
                  @if($product->status_id == 1)
                  <label class="switch">
                    <input type="checkbox" onclick="updateStatus({{$product->id}})" checked>
                    <span class="slider round"></span>
                  </label>
                  @elseif($product->status_id == 2)
                  <label class="switch">
                    <input type="checkbox" onclick="updateStatus({{$product->id}})">
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
              <th>Descripción</th>
              <th>Precio de Proveedor</th>
              <th>Precio de Venta</th>
              <th>Existencias</th>
              <th>Iva</th>
              <th>Usuario</th>
              <th>Categoría</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="card-footer">

      </div>
    </div>
  </div>
</div>

<!-- modal de nuevo registro -->
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h4 class="modal-title">Productos <i class="fas fa-plus"></i></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
      </div>

      <form action="" class="validar" id="form">

        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digíte el nombre del producto">
            </div>
           
            <div class="form-group col-md-12">
              <label for="purchase_price">Precio Proveedor<span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="purchase_price" id="purchase_price" placeholder="Digíte el precio de proveedor">
            </div>
            <div class="form-group col-md-12">
              <label for="name">Precio Venta<span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Digíte el precio de proveedor">
            </div>
            <div class="form-group col-md-12">
              <label for="stock">Existencias<span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="stock" id="stock" placeholder="Digíte el numero de existencias">
            </div>
            <div class="form-group col-md-12">
              <label for="iva">Iva %<span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="iva" id="iva" placeholder="Digíte el porcentaje de iva">
            </div>
            <div class="form-group col-md-12">
              <label for="category_id">Categoria del producto<span class="text-danger">*</span></label>
              <select name="category_id" id="category_id" class="form-control">
                <option value="">Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
            <div class="form-group col-md-12">
              <label for="description">Descripción del producto<span class="text-danger">*</span></label>
              <textarea name="description" id="description"  cols="30" rows="5" placeholder="Digíte la descripción del producto" class="form-control">

              </textarea>
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
<script src="{{asset('js/models/product.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable();

  });

  
</script>
@endsection