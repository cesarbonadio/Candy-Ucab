<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>candyucab</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
  <link rel="favicon" href="{{asset('img/candyIcon.png')}}">
  <link rel="shortcut icon" href="{{asset('usuario/Imagenes/candyIcon.png')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">




      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>C</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CandyUcab</b></span>
        </a>


 <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top" role="navigation">
     <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>
        </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">Nombre del empleado</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      Nombre del empleado
                    </p>
                    <p>
                      Cargo del emplado
                    </p>
                    <p>
                      Otros datos del empleado
                    </p>
                    <p>
                      Rol dentro del sistema
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

      </header>



      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Administrar</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../../administrar/producto"><i class="fa fa-circle-o"></i> Productos</a></li>
                <li><a href="../../../administrar/tienda"><i class="fa fa-circle-o"></i> Tiendas</a></li>
                <li><a href="../../../administrar/punto"><i class="fa fa-circle-o"></i> Punto</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Inventario</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Almacén</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Anaqueles</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Pedidos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Cliente</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../../cliente/natural"><i class="fa fa-circle-o"></i>Natural</a></li>
                <li><a href="../../../cliente/juridico"><i class="fa fa-circle-o"></i>Jurídico</a></li>
                <li><a href="../../../cliente/contacto"><i class="fa fa-circle-o"></i>Contactos (Jurídico)</a></li>
                <li><a href="../../../cliente/medio"><i class="fa fa-circle-o"></i>Medios de pago</a></li>
                <li><a href="../../../cliente/pedido"><i class="fa fa-circle-o"></i>Pedidos (físico)</a></li>
                <li><a href="../../../cliente/presupuesto"><i class="fa fa-circle-o"></i>Vender</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Nómina</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../nomina/asistencia"><i class="fa fa-circle-o"></i>Asistencia</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-list"></i>
                <span>Promociones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Diario</a></li>
                <li><a href="../../../promocion/descuento"><i class="fa fa-circle-o"></i>Descuentos</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Top - 10</a></li>
              </ul>
            </li>
             <li>
              <a href="../../../reporte">
                <i class="fa fa-plus-square"></i> <span>Reportes</span>
                <!--<small class="label pull-right bg-red">PDF</small>-->
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                <!--  <h3 class="box-title">Titulo de cualquiera de la paginas</h3>-->
                  <div class="box-tools pull-right">
                    <!--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
    <!--  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2018 <a href="#">CandyUcab</a></strong> All rights reserved.
      </footer> -->


      <!-- jQuery 2.1.4 -->
      <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('js/app.min.js')}}"></script>

  </body>
</html>
