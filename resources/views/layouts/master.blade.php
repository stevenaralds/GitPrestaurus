<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>PresTaurus | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
  <!-- estilos personalizados -->
  <link rel="stylesheet" href="/css/Breadcumb.css">




@yield('estilos')


  <!-- Google Font -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
</head>

<body class="hold-transition skin-blue sidebar-mini">

<!-- Site wrapper -->
<div id="app" class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pres</b>Taurus</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/images/user2-160x160.jpg" class="user-image" alt="User Image">
               @guest
                  Usuario no registrado
                @else
                  <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
                @endguest

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                @guest
                  Usuario no registrado
                @else
                  {{ Auth::user()->nombre }}
                @endguest
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              @guest
              <!-- Menu Footer-->

                <li class="user-footer">
                  <div class="pull-left">
                     <a href="{{ route('login') }}" class="btn btn-default btn-flat">{{ __('Login') }}</a>
                  </div>
                  <div class="pull-right">
                    @if (Route::has('register'))
                      <a class="btn btn-default btn-flat" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif

                  </div>
                </li>
              @else
                <li class="user-footer">
                  <div class="pull-left">
                    {{-- <a href="{{ route('profiles.index') }}" class="btn btn-default btn-flat">Perfil</a> --}}
                  </div>
                  <div class="pull-right">

                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

           @guest
              Usuario no registrado
            @else
              <p>{{ Auth::user()->nombre }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            @endguest

        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACION</li>
    @auth
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i>
            <span>Mi Capital</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- <li><a href="{{route('Basico')}}"><i class="fa fa-circle-o"></i> Básico</a></li> --}}
            <li><a href="{{ route('capital.index') }}"><i class="fa fa-circle-o"></i> Admin Capital</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Historial</a></li>
          </ul>
        </li>
        {{-- <li><a href="{{ route('capital.index') }}"><i class="fa fa-book"></i> <span>Mi Capital</span></a></li> --}}
        {{-- <li><a href="{{route('Blog')}}"><i class="fa fa-pencil-square-o"></i> <span>Blog</span></a></li> --}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('clientes.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
            <li><a href="{{ route('clientes.create') }}"><i class="fa fa-circle-o"></i> Crear</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Prestamos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('prestamos.create') }}"><i class="fa fa-circle-o"></i> Crear Prestamo</a></li>
            <li><a href="{{ route('prestamos.index') }}"><i class="fa fa-circle-o"></i> Listado por Usuario</a></li>
            <li><a href="{{ route('prestamoscliente.buscar') }}"><i class="fa fa-circle-o"></i> Listado por Cliente</a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart-o"></i>
              <span>Rutas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('rutas.index') }}"><i class="fa fa-circle-o"></i> Diaria</a></li>
              <li><a href="{{ route('rutas.indexSem') }}"><i class="fa fa-circle-o"></i> Semanal</a></li>
              <li><a href="{{ route('rutas.indexQui') }}"><i class="fa fa-circle-o"></i> Quincenal</a></li>
              <li><a href="{{ route('rutas.indexMen') }}"><i class="fa fa-circle-o"></i> Mensual</a></li>
            </ul>
          </li>

        
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Contacto</span></a></li>



            <li class="header">Administrador</li>



            <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span>Usuarios</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">


                        <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>


                        <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>


                        <li><a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i> Permisos</a></li>


                </ul>
            </li>
       @endauth

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    @yield('breadcrumb')

    @yield('Contenido')

    @yield('Contenido2')


    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Taurus Studio</a>.</strong> All rights
    reserved.
  </footer>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/bower_components/moment/min/moment.min.js"></script>
<script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

@yield('scripts')

</body>
</html>
