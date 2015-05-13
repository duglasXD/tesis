<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Unidad de la Mujer</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/funciones.js"></script>
</head>
<body style="background: url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_um.png) no-repeat;" id="banner"></header>

	<nav class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="index_unidadmujer.php"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyecto<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="form_proyecto.php" onclick="getElementById('centro').height='680px'"><i class="icon-file"></i> Nuevo</a></li>
								<li><a target="centro" href="act_proyecto.php" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<!-- <li><a target="centro" href="cons_proyecto.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list"></i> Control de actividades</a></li> -->
								<li><a target="centro" href="form_financiero.php" onclick="getElementById('centro').height='1000px'"><img src="../img/icon-money.png" height="15" width="15"> Actualizar Gastos</a></li>
								<li><a target="centro" href="form_asignar.php" onclick="getElementById('centro').height='1800px'"><i class="icon-edit"></i> Asignar a Proyecto</a></li>
							</ul>
						</li>
												
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Expediente<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="form_expediente.php" onclick="getElementById('centro').height='550px'"><i class="icon-file"></i> Nuevo</a></li>
								<li><a target="centro" href="act_expediente.php" onclick="getElementById('centro').height='550px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="cons_proyecto.php" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Proyecto</a></li>
								<li><a target="centro" href="cons_expediente.php" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Expediente</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Expedientes</a></li>
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Beneficiarios de proyecto</a></li>
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Proyectos anteriores</a></li>
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Costos por proyecto</a></li>
								<li><a target="centro" href="reportes.php?casorep=1" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Informe de violencia intrafamiliar</a></li>
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Indice de violencia</a></li>
							</ul>
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
		<object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no"></object>
	</div>			
	


</body>
</html>
