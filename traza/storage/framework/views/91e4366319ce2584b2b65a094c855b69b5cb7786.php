<!DOCTYPE html>
<html>
  <head>
     <style>
          #color1{color:red;}
          #color2{color:blue;}
             </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trazabilidad</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('css/_all-skins.min.css')); ?>">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="shortcut icon" href="img/favicon.ico">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="http://localhost:8000/traza/abscisas"> <href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b></span>

          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Trazabilidad</b>
          </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Obra lineal</small>
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      ´Giovanny 
                      <small> para obra ingenieria civil</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
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
            
			  <li class=" treeview active">
              <a href="#">
            
			  <i class="fa fa-cogs" aria-hidden="true"></i>
                <span>General</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class=" treeview active-menu">
                <li><a href="<?php echo e(url('traza/listas')); ?>"><i class="fa fa-circle-o "></i>Vehiculos</a></li>
                  <li><a href="<?php echo e(url('traza/canteras')); ?>"><i class="fa fa-circle-o "></i>Canteras</a></li>
                    <li><a href="<?php echo e(url('traza/materialProduccion')); ?>"><i class="fa fa-circle-o "></i>Material</a></li>
              </ul>
            </li>
            <li class=" treeview active">
              <a href="#">
            
			   <i class="fa fa-area-chart" aria-hidden="true"></i>
                <span>Abscisas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class=" treeview-menu">
                <li><a href="<?php echo e(url('traza/abscisas')); ?>"><i class="fa fa-circle-o"></i>Abscisas Obra</a></li>
              </ul>
            </li>
            
            <li class="treeview active">
              <a href="#">
                  <i class="fa fa-truck" aria-hidden="true"></i>
                <span>Vehiculos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class=" treeview-menu">
                <li><a href="<?php echo e(url('traza/choferes')); ?>"><i class="fa fa-circle-o"></i>Conductores</a></li>
                <li><a href="<?php echo e(url('traza/vehiculos')); ?>"><i class="fa fa-circle-o"></i>Coches de carga</a> </li>
                <li><a href="<?php echo e(url('traza/vehiculosTransporte')); ?>"><i class="fa fa-circle-o"></i>Transporte en obra</a>
                </li>
              </ul>
            </li>
            <li class=" treeview active">
              <a href="#">
               <i class="fa fa-cubes" aria-hidden="true"></i>
                <span>Materiales</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class=" treeview-menu">
                <li><a href="<?php echo e(url('traza/materiales')); ?>"><i class="fa fa-circle-o"></i>material</a></li>
               
              </ul>
            </li>  

            <li class=" treeview active">
              <a href="#">
               <i class="fa fa-steam-square" aria-hidden="true"></i>
                <span>Empresas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class=" treeview-menu">
                <li><a href="<?php echo e(url('traza/empresas')); ?>"><i class="fa fa-circle-o"></i>Registro</a></li>
               
              </ul>
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
                  <h3 class="box-title">Software  para manejar  la trazabilidad de una obra lineal</h3>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                             <?php echo $__env->yieldContent('contenido'); ?>
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
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b>7.0
        </div>
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(asset('js/jQuery-2.1.4.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src= "<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    
  </body>
</html>
