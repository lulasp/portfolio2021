<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Fastluza Equipment</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>



  <!-- Data Tables -->
  <link href="../public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
  <link href="../public/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
  <link href="../public/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

  <!--tablesorter here-->
  <script src="../public/js/jquery-latest.js"></script>
  <script src="../public/js/jquery.tablesorter.js"></script>

  <!--INSPINA CSS-->
  <link rel="stylesheet" href="{{ URL::asset('../public/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('../public/css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('../public/css/animate.css') }}">



</head>
<body id="app-layout">

  <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element">

              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Fastluza</strong>
                </span> <span class="text-muted text-xs block">
                  @if (Auth::guest())
                  Please login
                  @else
                  {{ Auth::user()->name }}
                  <b class="caret"></b></span> </span> </a>
                  <ul class="dropdown-menu animated fadeIn m-t-xs">
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                  </ul>
                  @endif

                </div>
                <div class="logo-element">
                  FL
                </div>
              </li>
              <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a></li>

              <li class="{{ Request::segment(1) === 'pats' || Request::segment(1) == 'patsf' || Request::segment(1) == '/pats/history' ? 'active' : null }}">
                <a href="#"><i class="fa fa-ticket"></i> <span class="nav-label">P.A.T's </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li class="{{ Request::segment(1) === 'pats' ? 'active' : null }}"><a href="{{ url('/pats') }}">P.A.T's</a></li>
                  <li class="{{ Request::segment(1) === 'patsf' ? 'active' : null }}"><a href="{{ url('/patsf') }}">P.A.T's Fornecedor</a></li>
                  <li class="{{ Request::segment(1) === '/pats/history' ? 'active' : null }}"><a href="{{ url('/pats/history') }}">Histórico</a></li>
                </ul>
              </li>
              <li class="{{ Request::segment(1) === 'equipamentos' ? 'active' : null }}"><a href="{{ url('/equipamentos') }}"><i class="fa fa-desktop"></i> <span class="nav-label">Equipamentos</span></a></li>
              <li class="{{ Request::segment(1) === 'clientes' ? 'active' : null }}"><a href="{{ url('/clientes') }}"><i class="fa fa-users"></i> <span class="nav-label">Clientes</span></a></li>

              <li class="dropdown {{ Request::segment(1) === 'categorias' || Request::segment(1) == 'marcas' || Request::segment(1) == 'fornecedores' || Request::segment(1) == 'statuses' ? 'active' : null }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tabelas</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li class="{{ Request::segment(1) === 'categorias' ? 'active' : null }}"><a href="{{ url('/categorias') }}">Categorias</a></li>
                  <li class="{{ Request::segment(1) === 'marcas' ? 'active' : null }}"><a href="{{ url('/marcas') }}">Marcas</a></li>
                  <li class="{{ Request::segment(1) === 'fornecedores' ? 'active' : null }}"><a href="{{ url('/fornecedores') }}">Fornecedores</a></li>
                  <li class="{{ Request::segment(1) === 'statuses' ? 'active' : null }}"><a href="{{ url('/statuses') }}">Status</a></li>
                </ul>
              </li>

              <li class="{{ Request::segment(1) === 'users' ? 'active' : null }}">
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Definições</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li class="{{ Request::segment(1) === 'users' ? 'active' : null }}"><a href="{{ url('/users') }}">Utilizadores</a></li>

                </ul>
              </li>

              <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{{ url('/about') }}"><i class="fa fa-pied-piper-alt"></i> <span class="nav-label">About</span></a></li>
            </ul>

          </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
          <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
              <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>

              </div>
              <ul class="nav navbar-top-links navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                <span>
                  <img alt="image" class="img-circle" src="../public/images/logo.png" />
                </span>
                @else
                <span>
                  <img alt="image" class="img-circle" src="../public/images/logo.png" />
                </span>
                </li>
                @endif
              </ul>

            </nav>
          </div>
          <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-center m-t-lg">

                  @yield('content')

                </div>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="pull-right">
              <strong>Copyright</strong> Fastluza &copy; 2016
            </div>
          </div>

        </div>
      </div>



      <!-- JavaScripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


      <!--INSPINA JS -->

      <script src="../public/js/bootstrap.min.js"></script>
      <script src="../public/js/jquery-2.1.1.js"></script>

      <!-- Data Tables -->
      <script src="../public/js/plugins/dataTables/jquery.dataTables.js"></script>
      <script src="../public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
      <script src="../public/js/plugins/dataTables/dataTables.responsive.js"></script>
      <script src="../public/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


      <script src="../public/js/plugins/pace/pace.min.js"></script>
      <script src="../public/js/inspinia.js"></script>


      <script src="../public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <script src="../public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>



      <script src="../public/js/plugins/footable/footable.all.min.js"></script>
      <script src="../public/js/app.js"></script>

    </body>
    </html>
