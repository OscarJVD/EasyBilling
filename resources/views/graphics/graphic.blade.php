@extends('layouts.admin')

@section('title')
    <!-- titulo de la aplicacion y miga de pan  -->
    <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Productos <i class="far fa-building"></i></h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item"><a href="#">Productos</a></li>
             </ol>
           </div>
         </div>
       </div>
     </section>
     <!-- /. titulo de la aplicacion y miga de pan  -->
@endsection




@section('content')

  <!-- contenido principal de la pagina -->
     
  <div class="row">


<!-- TARJETAS DE COLORES -->
<div class="col-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Tarjetas informativas</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-lg-3 col-6">

          <!-- CARD INFO -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- /. CARD INFO -->

        <!-- CARD SUCCESS -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- /. CARD SUCCESS -->

        <!-- CARD WARNING -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>44</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
         <!-- /. CARD WARNING -->

        <!-- CARD DANGER -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- /. CARD DANGER -->

      </div>
    </div>

  </div>
</div>
<!-- TARJETAS DE COLORES -->



<!-- GRAFICAS ESTADISTICAS -->
<div class="col-md-6">

  <!-- LINE CHART -->
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Line Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>

    </div>
    <div class="card-body">
      <div class="chart">
        <!-- CONTIENE EL CODIGO DE LA GRAFICA POR ID -->
        <canvas id="line" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
         <!-- /. CONTIENE EL CODIGO DE LA GRAFICA POR ID -->
      </div>
    </div>
  </div>
  <!-- /. LINE CHART -->



  <!-- PIE CHART -->
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Pie Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <!-- CONTIENE EL CODIGO DE LA GRAFICA POR ID -->
      <canvas id="pie" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
       <!-- /. CONTIENE EL CODIGO DE LA GRAFICA POR ID -->
    </div>
  </div>
  <!-- /. PIE CHART -->



  <!-- DOUGHNAUT CHART -->
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Doughnut Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="card-body">
      <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
      <canvas id="doughnut" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
       <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
    </div>
  </div>
  <!-- /. DOUGHNAUT CHART -->

</div>

<div class="col-md-6">

  <!-- BAR HORIZONTAL -->
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">BAR HORIZONTAL</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <!-- AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
        <canvas id="bar-chart-horizontal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
         <!-- /. AQUI SE MUESTRA EL CODIGO DE LA GRAFICA -->
      </div>
    </div>
  </div>
  <!-- /. BAR HORIZONTAL -->


  <!-- BAR CHART COMPARARTIVO -->
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Bar Chart Comparativo</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <!-- AQUI SE MUESTRAN LOS DATOS DE LA BD -->
        <canvas id="bar-chart-grouped" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        <!-- /. AQUI SE MUESTRAN LOS DATOS DE LA BD -->
      </div>
    </div>
  </div>
  <!-- /. BAR CHART COMPARARTIVO -->


  <!-- STACKED BAR CHART -->
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Stacked Bar Chart</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="Chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
  </div>
  <!-- /: STACKED BAR CHART -->

</div>
<!-- GRAFICAS ESTADISTICAS -->

<!-- CALENDARIO -->
<div class="col-12">
<div class="card card-outline card-warning+">
  <div class="card-header">
    <h3 class="card-title">Calendario</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>

    </div>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-lg-3 col-6">

        <div id="calendar" style="width: 1100px;"></div>

    </div>
  </div>

</div>
</div>
<!-- CALENDARIO -->

</div>
</div>
     
   <!-- /contenido principal del pagina  -->



@endsection

@section('scripts')
    <!-- GRAFICAS -->
<script>

// LINE CHART

new Chart(document.getElementById("line"), {
  type: 'line',
  data: {
    // ITEMS DEL EJE X
    labels: [1500,1600,1700],
    // /.ITEMS DEL EJE X


    datasets: [
      // AQUI SE MUESTRAN LOS DATOS DE LA BD
      {
        data: [86,114,106],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false
      },
      {
        data: [282,350,411],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false
      },
      {
        data: [168,170,178],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false
      },
      // /.AQUI SE MUESTRAN LOS DATOS DE LA BD
    ]
  },

  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)',
    }
  }
});

// /. LINE CHART


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
      }

  });
  // /. PIE CHART


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


//BAR HORIZONTAL
  new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          //ITEM POR EL CUAL SE HARÁ REFERENCIA DEL DATO DE LA BD
          label: "Population (millions)",
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
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
// /. BAR HORIZONTAL


//BAR CHART COMPEARTIVO
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      // ITEMS DEL EJE X
      labels: ["1900", "1950", "1999", "2050"],
      // /. ITEMS DEL EJE X
      datasets: [

        //AQUI SE IMPRIMEN LOS VALORES DE LA BD
        {
          label: "item 1",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "item 2",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
         // /. AQUI SE IMPRIMEN LOS VALORES DE LA BD

      ]
    },
    options: {
      title: {
        display: true,
        // TITULO DE LA GRAFICA
        text: 'inserte el titulo aqui'
        // /. TITULO DE LA GRAFICA
      }
    }
});
// /. BAR CHART COMPARATIVO



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
<!-- /. GRAFICAS -->

<!-- FULL CALENDAR -->
<script>


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var colores = ['#f56954', '#f39c12', '#0073b7', '#00c0ef', '#00a65a', '#3c8dbc'];

    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      themeSystem: 'bootstrap',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week : 'semana',
        day  : 'día',
        list: 'lista'
      },
      weekNumbers: true,
      dayMaxEvents: true,

      events: [
        // AQUI SE IMPRIMEN LOS EVENTOS
        {
          title: 'Front-End Conference',
          start: "2020-10-09 14:05:00",
          end: "2020-10-09 23:07:00",
          backgroundColor: '#f56954'
        },

          {
          title: "traer hoja de vida",
          start: "2020-10-09 14:05:00",
          end: "2020-10-09 23:07:00",
          backgroundColor: '#f39c12'
         },

          {
          title: "entrevista",
          start: "2020-10-12 19:31:00",
          end: "2020-10-12 21:31:00",
          backgroundColor: '#0073b7'
         },
        // /. AQUI SE IMPRIMEN LOS EVENTOS

    ]

    });

    calendar.render();
  });


</script>
<!-- /. FULL CALENDAR -->


@endsection