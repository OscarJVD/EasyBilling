{{ libxml_use_internal_errors(true) }}
@extends('layouts.admin')

@section('content')

 <!-- TARJETAS DE COLORES -->

 <div class="card card-outline card-primary mt-5">
                <div class="card-header">
                  <h2 class="text-center">Bienveni@ {{auth()->user()->name}} {{auth()->user()->surname}}</h2>

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

                <div class="login-box bg-light m-auto mb-3">
           
           <div class=" card-outline card-primary m-auto " >

             <div class="card-header">
               <h4 class="text-center">Generador de codigo de barras</h4>
             </div>

             <div class="card-body">


              <form action="{{url('home')}}" method="get">

                 <input type="text"  class="form-control"  name="valor" placeholder="Digita un código">

                 <button type="submit" class="btn btn-primary form-control mt-3">Generar</button>

              </form>

                <svg id="barcode"></svg>

               </div>

               </div>
           
                </div>

              </div>
           
            <!-- TARJETAS DE COLORES -->

         
            



            <?php
                 

                 if(isset($_GET["valor"])) {

                    $valor = $_GET["valor"];
                    
                 }
                 
            
            ?>


        
            @endsection

@section('scripts')

<script>

    JsBarcode("#barcode", "<?php if(isset($_GET["valor"])){echo $valor;}else{ echo" codigo"; } ?>");

</script>

@endsection