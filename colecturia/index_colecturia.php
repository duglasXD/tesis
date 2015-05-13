<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Colecturia</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="js/notificaciones.js"></script>
</head>
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_co.png) no-repeat;" id="banner"></header>

	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_colecturia.php"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge" id="num_not">0</span>&nbsp;&nbsp;&nbsp;Cobros<b class="caret"></b></a>
							<ul class="dropdown-menu" id="divX">
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Impuesto<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-file"></i> Nuevo</a></li>
								<li><a href="act_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar</a></li>
								<li><a href="form_condonacion_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-remove"></i> Condonación</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-search"></i> AA</a></li>
								<li><a href="#" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-search"></i> AA</a></li>
								<li><a href="#" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-search"></i> AA</a></li>
								<li><a href="#" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-search"></i> AA</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
						</li>

					</ul>
					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li><a href="../index.php"><i class="icon-off icon-white"></i> Cerrar Sesión</a></li>
          			</ul>
				</div>
			</div>
		</div>		
	</div>
	
	<div class="container" style="width:1024px;">
		<object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no">
		</object>
	</div>	
	

	<footer>
		
	</footer>
</body>
</html>