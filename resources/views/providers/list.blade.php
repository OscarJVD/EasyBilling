@extends('layouts.admin')

@section('title')
    <!-- titulo de la aplicacion y miga de pan  -->
    <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Proveedores <i class="far fa-building"></i></h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item"><a href="#">Proveedores</a></li>
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
            <th class="text-center">#</th>
            <th class="text-center">NIT</th>
            <th class="text-center">Nombre de empresa</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Estado</th>
          </tr>

          </thead>

          <tbody>
              @foreach ($providers as $provider)
                  <tr>
                      <td>{{ $provider->id }}</td>
                      <td>{{ $provider->nit }}</td>
                      <td>{{ $provider->name }}</td>
                      <td>{{ $provider->email }}</td>
                      <td>{{ $provider->address }}</td>
                      <td>{{ $provider->phone }}</td>
                      <td>{{ $provider->status->name }}</td>
                  </tr>
              @endforeach
          </tbody>

          <tfoot>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">NIT</th>
                <th class="text-center">Nombre de empresa</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Telefono</th>
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
        @forelse ($providers as $provider)
        <div class="col-md-4">
          <div class="card card-widget widget-user">
        
            <!-- titulo de la tarjeta -->
            <div class="widget-user-header bg-info">
              <h2 class="widget-user-username"><b> {{$provider->name}} </b></h2>
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
                    <h5 class="description-header">Nombre representante</h5>
                  <span class="description-text">{{$provider->name}} {{$provider->surname}}</span>
                  </div>  
                </div>
              
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Direccion</h5>
                    <span class="description-text">{{$provider->address}}</span>
                  </div>      
                </div>
        
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Telefono</h5>
                    <span class="description-text">{{$provider->phone}}</span>
                  </div>      
                </div>
        
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Nit</h5>
                    <span class="description-text">{{$provider->nit}}</span>
                  </div>      
                </div>
        
              
        
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Estado</h5>
                    <span class="description-text">{{$provider->status->name}}</span>
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



<!-- modal de nuevo registro -->
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h4 class="modal-title">Usuario <i class="fas fa-plus"></i></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <form action="" class="validar">

         <div class="modal-body">


          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nombre completo <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Digíte su nombre completo">
            </div>
            <div class="form-group col-md-6">
              <label for="surname">Apellidos <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="surname" id="surname" placeholder="Digíte sus apellidos">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="typeDocument">Tipo de documento <span class="text-danger">*</span></label>
              <select class="form-control" name="typeDocument" id="typeDocument">
                <option value="">Seleccione..</option>
                <option value="CC">Cédula de ciudadania</option>
                <option value="TI">Tarjeta de identidad</option>
                <option value="PA">Pasaporte</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="document">Número de documento <span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="document" id="document" placeholder="Digíte su documento">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="birthdate">Fecha de nacimiento <span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="birthdate" id="birthdate" >
            </div>
            <div class="form-group col-md-6">
              <label for="email">Correo electrónico <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Digíte su correo electrónico">
            </div>
          </div>





         </div>

         <div class="modal-footer pull-right">
           <button type="reset" class="btn btn-outline-secondary">Limpiar <i class="fas fa-backspace"></i></button>
          <button type="submit" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
        </div>

    </form>

    </div>
  </div>
</div>
<!-- /. modal de nuevo registro -->

@endsection

@section('scripts')
    
@endsection