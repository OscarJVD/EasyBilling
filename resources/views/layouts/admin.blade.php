<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy Billing</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<div class="wrapper">

  <!-- Menú horizontal -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">

    <!-- links del menu horizontal -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->
    <!-- /. links del menu horizontal -->


    <ul class="navbar-nav ml-auto">

      <!-- Notificaciones del menu horizontal -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- /. Notificaciones del menu horizontal -->


      <li class="nav-item">
      <a href="{{route('logout')}}" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>

      </a>
      </li>


    </ul>
  </nav>
  <!-- /menu horizontal -->



  <!-- menu vertical -->
  <aside class="main-sidebar sidebar-light-dark elevation-4">

    <a href="../../index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Easy Billing</span>
    </a>

    <!-- titulo y foto del menu vertical -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}} {{auth()->user()->surname}}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link">
              <i class="fas fa-home"></i> <p>Inicio</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('user')}}" class="nav-link">
              <i class="fas fa-user"></i> <p>Usuario</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('company')}}" class="nav-link">
              <i class="fas fa-building"></i> <p>Empresa</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('shop')}}" class="nav-link">
              <i class="fas fa-store-alt"></i> <p>Sucursal</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('category')}}" class="nav-link">
              <i class="fas fa-list"></i> <p>Categorias</p>
            </a>
          </li>

          <li class="nav-itegit m">
            <a href="{{url('product')}}" class="nav-link">
              <i class="fas fa-shopping-bag"></i> <p>Productos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('provider')}}" class="nav-link">
              <i class="fas fa-truck-moving"></i> <p>Proveedor</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('orders')}}" class="nav-link">
              <i class="fas fa-shopping-cart"></i> <p>Pedido</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url('bill')}}" class="nav-link">
            <i class="fas fa-file-invoice-dollar"></i> <p>Factura</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('role')}}" class="nav-link">
              <i class="fas fa-address-book"></i> <p>Roles</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('status')}}" class="nav-link">
              <i class="fas fa-toggle-on"></i> <p>Estados</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('type_status')}}" class="nav-link">
              <i class="fas fa-keyboard"></i> <p>Tipos de estado</p>
            </a>
          </li>

          <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> <p>Cerrar Sesión</p>

       </a>
      </li>



        </ul>
      </nav>
    </div>
  </aside>
  <!-- /menu vertical -->



  <!-- contenido principal de la pagina -->
  <div class="content-wrapper">
    @yield('title')
    <!-- ubicación de tablas y formularios -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('content')

          </div>
        </div>
      </div>
    </section>
    <!-- /. ubicación de tablas y formularios -->
  </div>
  <!-- /contenido principal del pagina  -->


  <!-- footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  <!-- /.footer -->

</div>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/c')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{asset('plugins/barcode/JsBarcode.code128.min.js')}}"></script>

<!-- archivo en el cual se establece el statable por el id de la página -->
<script src="{{asset('plugins/datatables/call-datatable.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- Validator js -->
<script src="{{asset('js/validator.js')}}"></script>

<!-- sweetalert js -->
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<!-- chart js -->
<script src="{{asset('js/chart.js')}}"></script>
@yield('scripts')

</body>
</html>