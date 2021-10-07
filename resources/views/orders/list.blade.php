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
               <li class="breadcrumb-item"><a href="#">Pedidos</a></li>
             </ol>
           </div>
         </div>
       </div>
     </section>
     <!-- /. titulo de la aplicacion y miga de pan  -->
@endsection


@section('content')
<div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-primary">

              <!-- card-header -->
              <div class="card-header">
                <button class="btn btn-danger text-right" id="add">Pedidos <i class="fas fa-plus"></i></button>
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
                      <th>Editar/Estado</th>
                      <th>Nombre</th>
                      <th>Editar</th>
                      <th>Editar/Estado</th>


                    </tr>
                  </thead>
                  <tbody id="table-body">
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Editar</th>
                      <th>Editar/Estado</th>
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
          <div class="col-md-4">
          <div class="card card-outline card-danger">

          <div class="card-header">
          </div>
          <div class="card-body">
             
             <div class="chart">
                    <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
                    <canvas id="Chart"></canvas>
                     <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
              </div>
              <div class="chart" style="margin-top:5%;">
                    <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
                    <canvas id="doughnut" ></canvas>
                     <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
              </div>
              
          </div>
          <div class="card-footer"></div>

          </div>
          </div>
</div>


@endsection

@section('scripts')
    <script src="{{asset('js/models/category.js')}}"></script> 
    <script>
        $(document).ready(function() {
            datatable()
            
        });
    </script>

    <script>
      
 // DOUGNHNUT CHART
 var ctx = document.getElementById('doughnut').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {

          //AQUI SE MUESTAN LOS ITEMS QUE APARECEN AL PRINCIPIO
          labels: ['Blue', 'Purple', 'Green', 'Pink', 'Red'],
          // /. AQUI SE MUESTAN LOS ITEMS QUE APARECEN AL PRINCIPIO

          datasets: [{

              //AQUI SE IMPRIMIENT LOS VALORES NUMERICOS TRAIDOS DE LA BD
              data: [12, 19, 3, 5, 2],
               // /. AQUI SE IMPRIMIENT LOS VALORES NUMERICOS TRAIDOS DE LA BD

              //COLORES QUE APARECEN EN LA GRAFICA
              backgroundColor: [
              "#3e95cd",
              "#8e5ea2",
              "#3cba9f",
              "#e8c3b9",
              "#c45850"

              ]
              // /. COLORES QUE APARECEN EN LA GRAFICA
          }]
      }

  });
  // /. DOUGNHNUT CHART

//BAR CHART COMPARATIVO
var ctx = document.getElementById('Chart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',


    data: {
      // AQUI SE MUESTRAN LOS ITEMS
      labels: ["item 1", "item 2", "item 3", "item 4", "item 5", "item 6"],
       // /. AQUI SE MUESTRAN LOS ITEMS
      datasets: [

        {
          //DATO QUE REFERENCIA EL VALOR
          label: "Population (millions)",
          // /. DATO QUE REFERENCIA EL VALOR

          //COLORES DE LA GRAFICA
          backgroundColor: [ '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          //COLORES DE LA GRAFICA

          // DATOS NUMERICOS DE LA BD
          data: [2478,5267,734,784,433,634]
          //DATOS NUMERICOS DE LA BD

        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,

        //TITULO DEL INICIO
        text: 'INSERTE EL TITULO AQUI'
        //TIUTLO DEL INICIO

      }
    }

  });
  // /.BAR CHART COMPARATIVO


</script>
    
    </script>
@endsection