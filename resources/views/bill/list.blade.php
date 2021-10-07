@extends('layouts.admin')

@section('title')
    <!-- titulo de la aplicacion y miga de pan  -->
    <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Factura <i class="far fa-building"></i></h1>
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

<div class="row">

<div class="col-lg-5 col-xs-12">
    
    <div class="card card-outline card-success " >
          
        <div class="card-header with-border"></div>

        <div class="card-body">
            
            <form action="">

                
                    
                    <div class="form-group">

                        <input type="text" class="form-control" readonly>
                    
                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" readonly>
                    
                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" readonly>
                    
                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            
                            <select name="" id="" class="form-control">

                                <option value="">Seleccionar cliente</option>

                            </select>

                            <span class="input-group-addon"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></span>

                        </div>

                    
                    </div>

                    <div class="form-row">
                        <table>
                          <thead>
                            <tr>
                              <th>Producto</th>
                              <th>Cantidad</th>
                              <th>Total</th>
                              <th>Iva</th>
                            </tr>
                          </thead>
                       
                        <tbody id="products">
                        
                        </tbody>
                        
                      </table>

                    </div>


                  <!--  <button type = "button" class="btn btn-success hidden-lg">Agregar <i class="fas fa-plus"></i></button> -->

                    <div class="row float-right mt-3">
                        <div class="col-xs-8">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:1%";>
                                            
                                            <div class="input-group">

                                                <input type="number" class="form-control" value="19" readonly>  
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>         
                                            </div>

                                        </td>
                                    
                                        <td style="width:3%";>
                                            
                                            <div class="input-group">

                                                <input type="number" class="form-control" value="19" readonly>  
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">$</div>
                                                </div>         
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br><br>
                

                   
                      <div class="row mt-5" style="margin-top:3%;">
                        <div class="col">
                          <select name="" id="" class="form-control">
                            <option value="">Seleccione la forma de pago</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta credito">Tarjeta credito</option>
                            <option value="tarjeta debito">Tarjeta debito</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Código de transacción">
                        </div>
                      </div>

        </div>

         <div class="card-footer m-auto">
          <button class="btn btn-success" type="submit">Guardar <i class="fas fa-save"></i></button>
        </div>

      </form>

         
    </div>

</div>

<div class="col-lg-7 hidden-sm hidden-xs">

    <div class="card card-outline card-success">

      <div class="card-header  with-border"></div>
      <div class="card-body">
      <table id="table" class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio unidad</th>
            <th>Cantidad</th>
            <th>Iva</th>
            <th>Acciones</th>
          </tr>
         </thead>
         @foreach ($products as $product)
         @if ($product->status_id == 7)
             <tr class="bg-secondary">
         @else
            <tr>
         @endif
               <td>{{$product->id}}</td>
               <td>{{$product->name}}</td>
               <td>{{$product->description}}</td>
               <td>{{$product->sale_price}}</td>
               <td>{{$product->stock}}</td>
               <td>{{$product->iva}}%</td>
               <th><button class="btn btn-primary" onclick="addProduct({{$product->id}})">Agregar <i class="fas fa-plus"></i></button></th>

             </tr>
         @endforeach
          
      


      </table>
    </div>

    </div>
    

</div>
 
</div>

@endsection

@section('scripts')
<script src="{{asset('js/models/bill.js')}}"></script>
<script>
  $(document).ready(function() {
    datatable()

  });
</script>
@endsection