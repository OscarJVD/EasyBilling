@extends('layouts.admin')

@section('title')
    <!-- titulo de la aplicacion y miga de pan  -->
    <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Categorias <i class="fas fa-list"></i></h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="#">Categorias</a></li>

             </ol>
           </div>
         </div>
       </div>
     </section>
     <!-- /. titulo de la aplicacion y miga de pan  -->
@endsection


@section('content')
<div class="row">
          <div class="col-md-6">
            <div class="card card-outline card-primary">

              <!-- card-header -->
              <div class="card-header">
                <button class="btn btn-danger text-right" id="add">Categorias <i class="fas fa-plus"></i></button>
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
                      <th>Editar/Estado</th>


                    </tr>
                  </thead>
                  <tbody id="table-body">
                    @foreach ($categories as $category)
                      <tr>
                        {{ !empty($category->products->name) ? $category->products->name : ''}}
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        @if($category->status->name == "Activo")

                        <td><label class='btn btn-success btn-xs'>{{$category->status->name}}</label></td>
                        @else
                        <td ><label class='btn btn-danger btn-xs'>{{$category->status->name}}</label></td>
                        @endif
                        <td>

                          <div class="form-group">
                              <a href="#" class="btn btn-xs btn-info" onclick="edit({{$category->id}})"><i class="fas fa-pen"></i></a>

                          @if($category->status_id == 1)
                                  <label class="switch ml-3">
                                      <input type="checkbox" onclick="updateStatus({{$category->id}})" checked>
                                      <span class="slider round"></span>
                                  </label>
                              @elseif($category->status_id == 2)
                                  <label class="switch ml-3">
                                      <input type="checkbox" onclick="updateStatus({{$category->id}})">
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
                      <th>Editar</th>
                      <th>Editar/Estado</th>
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
          <div class="col-md-6">
          <div class="card card-outline card-danger">

          <div class="card-header">
          </div>
          <div class="card-body">

             <div class="chart">
                    <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
                    <canvas id="bar-chart-horizontal" ></canvas>
                     <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
              </div>
              <div class="chart" style="margin-top:5%;">
                    <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
                    <canvas id="pie" ></canvas>
                     <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
              </div>

          </div>
          <div class="card-footer"></div>

          </div>
          </div>
</div>

<!-- modal de nuevo registro -->
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h4 class="modal-title">Categorias <i class="fas fa-plus"></i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <form action="" class="validar" id="form">

         <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="name">Nombre<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digíte su nombre completo">
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
    <script src="{{asset('js/models/category.js')}}"></script>
    <script>
        $(document).ready(function() {
            datatable()

        });
    </script>

    <script>

          // PIE CHART
  var ctx = document.getElementById('pie').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        // SON LOS ITEMS QUE SE DESCRIBEN AL PRINCIPIO
          labels: ['Red', 'Green', 'Yellow', 'Aqua', 'Blue', 'Gray'],
         // /. SON LOS ITEMS QUE SE DESCRIBEN AL PRINCIPIO

          datasets: [{

              //AQUI SE MUESTRAN LOS DATOS DE LA BD CON SUS RESPECTIVOS COLORES
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
              '#f56954',
              '#00a65a',
              '#f39c12',
              '#00c0ef',
              '#3c8dbc',
              '#d2d6de'

              ]
              // /. AQUI SE MUESTRAN LOS DATOS DE LA BD CON SUS RESPECTIVOS COLORES
          }]
      },
      options: {

      title: {
        display: true,
        text: 'Número de productos registrados para cada categoria'
      }
    }

  });
  // /. PIE CHART


  //BAR HORIZONTAL
  new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          //ITEM POR EL CUAL SE HARÁ REFERENCIA DEL DATO DE LA BD
          label: "Número de productos",
          // /.ITEM POR EL CUAL SE HARA REFERENCIA DEL DATO DE LA BD

          // COLORES DE FONDO
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
           // /.COLORES DE FONDO

          //DATOS QUE SE MUESTRAN  DE LA BD
          data: [2478,5267,734,784,433]
          // /. DATOS QUE SE MUESTRAN DE LA BD DE LA BD
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Número de productos registrados para cada categoria'
      }
    }
});
// /. BAR HORIZONTAL

    </script>
@endsection