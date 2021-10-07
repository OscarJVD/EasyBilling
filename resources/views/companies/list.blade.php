@extends('layouts.admin')

@section('title')
    <!-- titulo de la aplicacion y miga de pan  -->
    <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Empresas <i class="far fa-building"></i></h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item"><a href="#">Empresas</a></li>
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


 <div id="accordion" style="width: 100%;">

   <!-- acordion1 -->
  <div class="card">

    <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <label class="" > <i class="fas fa-list"></i>
          Visualizar tabla
        </label>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

        <table id="example1" class="table table-striped">
          <thead>

          <tr>
            <th class="text-center">Código</th>
            <th class="text-center">NIT</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Teléfono</th>
            <th class="text-center">Estado</th>
          </tr>

          </thead>

          <tbody>
              @foreach ($companies as $company)
                  <tr>
                      <td>{{ $company->id }}</td>
                      <td>{{ $company->nit }}</td>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->address }}</td>
                      <td>{{ $company->email }}</td>
                      <td>{{ $company->phone }}</td>
                      @if($company->status->name == "Activo")
                       <td><label class="btn-xs btn-success">{{$company->status->name}}</label></td>
                      @else
                      <td><label class="btn-xs btn-danger">{{$company->status->name}}</label></td>
                      @endif
                  </tr>
              @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th class="text-center">Código</th>
              <th class="text-center">NIT</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Correo</th>
              <th class="text-center">Teléfono</th>
              <th class="text-center">Estado</th>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>
  </div>
   <!-- acordion1 -->


   <div class="card">
    <div class="card-header bg-secondary" id="headingTwo" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <label class="" > <i class="fas fa-list"></i>
        Visualizar Tarjetas
      </label>
    </div>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body row">
         <!-- inicio de tarjeta -->
        @forelse ($companies as $company)
        <div class="col-md-4">
          <div class="card card-widget widget-user">

            <!-- titulo de la tarjeta -->
            <div class="widget-user-header bg-info">
              <h2 class="widget-user-username"><b> {{$company->name}} </b></h2>
            </div>
            <!-- /. titulo de la tarjeta -->

            <!-- imagen -->
            <div class="widget-user-image">
              <img class="" src="{{asset('img/building.png')}}" >
            </div>
            <!-- imagen -->

            <!-- datos tarjeta -->
            <div class="card-footer">
              <div class="row">


                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">NIT</h5>
                    <span class="description-text">{{$company->nit}}</span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Dirección</h5>
                    <span class="description-text">{{$company->address}}</span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Correo electrónico</h5>
                    <span class="description-text">{{$company->email}}</span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Teléfono</h5>
                    <span class="description-text">{{$company->phone}}</span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Experiencia Laboral</h5>
                    <span class="description-text">{{$company->years_experiences}}</span>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Estado</h5>
                    <span class="description-text">{{$company->status->name}}</span>
                  </div>
                </div>

              </div>
            </div>

            <!-- /. datos tarjeta -->

          </div>
                  </div>
        @empty

        @endforelse
         <!-- /. fin de tarjeta -->
      </div>
    </div>

  </div>



<!-- /contenido principal del pagina  -->




@endsection

@section('scripts')

@endsection