<?php 
	session_start();
	if($_SESSION['ta02_nivel']!="6"){//deja entrar si es seguridad
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=6";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguridad</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<script src="../js/jquery.min-1.7.1-google.js"></script>
	<script src="../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <link   href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link   href="jquery.fileDownload-master/src/Content/Site.css" rel="stylesheet" type="text/css" />
    <script src="jquery.fileDownload-master/src/Scripts/jquery.fileDownload.js" type="text/javascript"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shCore.js"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shBrushJScript.js"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shBrushXml.js"></script>
    <link   type="text/css" rel="stylesheet" href="jquery.fileDownload-master/src/Content/shCoreDefault.css" />
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/jquery.gritter.min.js"></script>
    <link   type="text/css" rel="stylesheet" href="jquery.fileDownload-master/src/Content/jquery.gritter.css" />
	<script>
		function cs(){
			//alert("hola mono");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET','../seguridad/ajaxseguridad.php?caso=borrar',true);
	        xmlhttp.send();
			window.location="../index.php";
		}
		function backup(){
      $.ajax({
          type:"post",
          url: "back_rest.php",
          data:{actionButton:'Export'},
          success:function(responseText){
              $.fileDownload(responseText);
          }
      });    
  }
	</script>
</head>
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_se.png) no-repeat;" id="banner"></header>
		<!-- <div class="span1 offset4"><img src="../img/application-pgp-signature.png" alt="" ></div>
		<div class="span3"><h1 style="color:white;text-shadow:0 1px 0 black;">Seguridad</h1></div>
		<div class="span1"><img src="../img/stock_lock.png" alt=""></div> -->
	

	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_seguridad.php"> <i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_nuevo_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Registrar usuario</a></li>
								<li><a href="form_act_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Actualizar datos de usuario</a></li>
								<li><a href="form_ab_usuario.php"><i class="icon-list-alt"></i> Alta/Baja usuario</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Backups<b class="caret"></b></a>
							<ul class="dropdown-menu">
									<li><a style="cursor:pointer;" onclick="backup();"><i class="icon-download"></i> Hacer copia de seguridad</a></li>
                <li><a href="form_restaurar.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-upload"></i> Restaurar copia de seguridad</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bit&aacute;cora<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="bitacora.php" target="centro" onclick="getElementById('centro').height='980px'"><i class="icon-eye-open"></i> Registro de actividad</a></li>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li><a href="javascript:cs()"><i class="icon-off icon-white"></i> Cerrar Sesión</a></li>
          			</ul>
			</div>
		</div>
	</div>
	<div class="container" style="width:1024px;">
		<object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no"></object>
	</div>	
	<footer></footer>
</body>
</html>