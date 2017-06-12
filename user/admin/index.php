<?php
session_start(); /* Verificar inicio de sesion*/
$usuario      = $_SESSION['usuario'];
$token        = $_SESSION['val'];
$nombreuser   = $_SESSION['nombreuser'];
$apellidouser = $_SESSION['apellidouser'];
//comprobar inicio de sesion
if (!isset($usuario) && $token != 'true') {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>SAES</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../../assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
	<link href="../../assets/css/animate.min.css" rel="stylesheet" />
	<link href="../../assets/css/style.css" rel="stylesheet" />
	<link href="../../assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="../../assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->


	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand"><span class="navbar-logo"></span><strong>SAES</strong></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../../assets/img/default-user.png" alt="" />
							<span class="hidden-xs"><?php echo $nombreuser . " " . $apellidouser?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Editar Perfil</a></li>
							<li class="divider"></li>
							<li><a href="../../class/sesion/signout.php">Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="../../assets/img/default-user.png" alt="" /></a>
						</div>
						<div class="info">
							<?php echo $nombreuser . " " . $apellidouser ?>
							<small>Administrador</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menu</li>
					<li id="crearfactura"><a href="#" id="crearfactura"><i class="fa fa-file-text"></i> <span>Crear Factura</span></a></li>
					<li id="agregarcajas"><a href="#" id="agregarcajas"><i class="fa fa-cubes"></i> <span>Ingresar Cajas</span></a></li>
					<li class="has-sub" id="crear">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-plus" aria-hidden="true"></i>
					        <span>Agregar</span>
					    </a>
						<ul class="sub-menu">
							<li id="nuevocliente"><a href="#" id="nuevocliente">Nuevo Cliente</a></li>
							<li id="nuevoproducto"><a href="#" id="nuevoproducto">Nuevo Producto</a></li>
						</ul>
					</li>
					<li class="has-sub" id="herramientas">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-cogs" aria-hidden="true"></i>
					        <span>Herramientas</span>
					    </a>
						<ul class="sub-menu">
							<li id="adminclientes"><a href="#" id="adminclientes">Administrar Clientes</a></li>
							<li id="adminproductos"><a href="#" id="adminproductos">Administrar Productos</a></li>
							<li id="adminfacturas"><a href="#" id="adminfacturas">Administrar Facturas</a></li>
							<li id="admincajas"><a href="#" id="admincajas">Administrar Cajas</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
					        <span>Reportes</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="#" id="reportecaja">Cajas</a></li>
							<li><a href="#" id="reportefactura">Facturas</a></li>
							<li><a href="#" id="reportecontrato">Contrato</a></li>
						</ul>
					</li>
					

			        <!-- begin sidebar minify button -->
					<!--<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>-->
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content ">
			<!--begin contenido -->
			<div id="contenido">

			</div>
			<!-- end contenido -->
		</div>
		<!-- end #content -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="../../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="../../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="../../assets/js/dashboard.js"></script>
	<script src="../../assets/js/apps.js"></script>
	<script src="../../assets/plugins/select2/dist/js/select2.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ================== BEGIN ADMIN ================== -->
	<script src="../../assets/js/admin_menu.js"></script>
	<!-- ================== END ADMIN ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});

	</script>
</body>
</html>
