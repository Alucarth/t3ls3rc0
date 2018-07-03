<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
    
	<!--libreria Bootstrap-->
	<link rel="stylesheet" href="<?=base_url()?>assets/temp/vendors/bootstrap/dist/css/bootstrap.min.css">
	
	
    
    <!-- Libreria de iconos-->
    <link href="<?=base_url()?>assets/temp/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- colores fondos y estilos css EDITAR PARA MANIPULACION -->
    <link href="<?=base_url()?>assets/temp//build/css/custom.min.css" rel="stylesheet">
  
    <link href="<?=base_url()?>assets/temp/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?=base_url()?>assets/temp/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/temp/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    

    <link href="<?=base_url()?>assets/lib/fullcalendar-2.2.6/fullcalendar.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/lib/fullcalendar-2.2.6/fullcalendar.print.css" rel="stylesheet" media="print">
    
    <!-- <link href="<?=base_url()?>assets/temp/vendors/select2/dist/css/select2.min.css" rel="stylesheet"> -->
     <link href="<?=base_url()?>assets/lib/select2/dist/css/select2.min.css" rel="stylesheet">


     <link href="<?=base_url()?>assets/temp/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

     <link rel="stylesheet" href="<?=base_url()?>assets/lib/bootstrap-datepicker/css/bootstrap-datepicker.css">
     
     
     <link href="<?=base_url()?>assets/lib/jquery-ui/jquery-ui.css" type="text/css" rel="stylesheet"/>
     


     <!-- <link rel="stylesheet" href="<?=base_url()?>assets/lib\bootstrap-datepicker\css/bootstrap-datepicker.css"> -->


     
   
    <!-- <script src="<?=base_url()?>assets/temp/vendors/js/jquery.min.js"></script> -->

    
    

	<title>TELSERCO S.R.L.| Athenys</title>
</head>
<body class="nav-md">

    <div class="container body">
        <div class="main_container">


        <!--Menu a la izquierda-->
         	<div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?=base_url()?>index.php/Login_controller/Principal" class="site_title"><i class="fa fa-spinner fa-pulse"></i> </i> <span>TELSERCO SRL</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?=base_url()?>assets/images/user_1.jpg" alt="..." class="img-circle profile_img">

                        </div>

                        <div class="profile_info">
                        
                            <h3><span>BIENVENID@,</span></h3>
                            <h2><?php echo $this->session->nombres ?></h2>
                            <h2><?php echo $this->session->apellidos ?></h2>
                            
                        </div>
                        <h4 align="center"><?php echo $this->session->cargo ?></h4>
                        <h5 align="center"><?php echo $this->session->labor." ".$this->session->labor1?></h5>

                    </div>
                    <!-- /menu prile quick info -->

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <!--h3>ALMACEN GENERAL</h3-->
                            <ul class="nav side-menu">
                                <?php if ($this->session->cargo == 'GERENTE' OR $this->session->cargo == 'ÁREA DE OPERACIONES') {?>
                                <li><a><i class="fa fa-home"></i> RECURSOS HUMANOS<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">PERSONAL</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonal">Gerencia</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalO">Operaciones</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalT">Técnicos Internos</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalB">Back Office</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalE">Técnicos Edificios</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalA">Almacén</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="#">CONTRATISTAS</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="<?=base_url()?>index.php/RecursosHumanos/ListarPersonalS">SUB-DEALER</a>
                                                </li>
                                                <li><a href="#">VEHÍCULOS</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">CLIENTES</a>
                                            <ul class="nav child_menu" style="display: none">
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <?php }?>
                                <li><a><i class="fa fa-cubes"></i>ALMACÉN<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url()?>index.php/Herramientas_almacen/ListarNotaIng">NOTA DE INGRESO A ALMACÉN</a>
                                        </li>
                                        <li><a href="<?=base_url()?>index.php/Almacen/ListarProductosGeneral">MATERIAL EN ALMACÉN</a>
                                        </li>
                                        <li><a href="#">MATERIAL INSTALACIÓN</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="<?=base_url()?>index.php/Almacen/ListarMaterialT">Técnicos</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/Material_interno/ListarPersonalS_mat">SubDealer</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/Almacen/ListarMaterialE">Edificios</a>
                                                </li>
                                                
                                                
                                            </ul>
                                        </li>
                                        <li><a href="#">MATERIAL DOTACIÓN</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="#">Técnicos</a>
                                                </li>
                                                <li><a href="#">Almacén</a>
                                                </li>                                               
                                                
                                            </ul>
                                        </li>
                                        <li><a href="#">PRÉSTAMO DE HERRAMIENTAS</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="#">Técnicos</a>
                                                </li>
                                                <li><a href="#">SubDealer</a>
                                                </li>
                                                <li><a href="#">Última Milla</a>
                                                </li>
                                                
                                                
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <?php if ($this->session->cargo == 'GERENTE' OR $this->session->cargo == 'ÁREA DE OPERACIONES') {?>
                                <li><a><i class="fa fa-phone"></i>BACKOFFICE<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url()?>index.php/Almacen/ListarNotaIng">REGISTRO DE OT</a>
                                        </li>
                                        <li><a href="<?=base_url()?>index.php/Almacen/ListarProductosGeneral">MATERIAL EN ALMACÉN</a>
                                        </li>
                                        <li><a href="#">MATERIAL ENTREGA</a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li><a href="<?=base_url()?>index.php/Almacen/ListarMaterialT">Técnicos</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/Material_interno/ListarPersonalS_mat">SubDealer</a>
                                                </li>
                                                <li><a href="<?=base_url()?>index.php/Almacen/ListarMaterialM">Última Milla</a>
                                                </li>
                                                
                                                
                                            </ul>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <?php }?>

                                 <!--li><a><i class="fa fa-table"></i> REPORTES <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    <?php if ($this->session->cargo == 'Administrador') {?>
                                        <li><a href="<?=base_url()?>index.php/Personal/reportePersonal">Reportes Personal Médico</a>
                                        </li>
                                         <?php }?>
                                        <li><a href="<?=base_url()?>index.php/Paciente/ReportesPaciente">Reportes Pacientes</a>
                                        </li>
                                        <?php if ($this->session->cargo == 'Administrador') {?>
                                        <li><a href="<?=base_url()?>index.php/UsuarioExterno/reporteUsuarios">Reportes Usuarios Portal</a>
                                        </li>
                                        <li><a href="<?=base_url()?>index.php/UsuarioPersonal/reporteUsuarios">Reportes Usuarios Personal</a>
                                        </li>
                                         <?php }?>
                                    </ul>
                                </li-->
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">

                        <a href="<?=base_url()?>index.php/login_controller/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
        <!--__________________________________________________-->


        <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?=base_url()?>assets/images/user_1.jpg" alt="">TELSERCO S.R.L.<!--?php echo $this->session->nombres." ".$this->session->apellidos ?-->
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?=base_url()?>index.php/login_controller/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                               
                               
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">