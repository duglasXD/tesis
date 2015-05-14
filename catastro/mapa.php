<!DOCTYPE html>
<html lang="es">
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	div#mapa{ height: 100%; width:70%;float: left; }
	div#menu{height: 100%; width:30%;float: left;}
</style>
<head>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp0xi0Mj1DrO0wran3J-9U5Fz-PBt2VjE&sensor=false"></script>
	<script src="../js/polygon.js"></script>
	<script src="js/mapa.js"></script>
</head>
<body>
	<div id="mapa"></div>
	<div id="menu">
		<div class="accordion" id="accordion2">
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c1">
		        Zonas
		      </a>
		    </div>
		    <div id="c1" class="accordion-body collapse">
		      <div class="accordion-inner">
		      	<a class="btn" href="#" onclick="addP()">Agregar</a>
		      	<a class="btn" href="#" onclick="remP()">Eliminar</a>
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c2">
		        Negocios
		      </a>
		    </div>
		    <div id="c2" class="accordion-body collapse">
		      <div class="accordion-inner">
		        Agregar,Modificar
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c3">
		        Inmuebles
		      </a>
		    </div>
		    <div id="c3" class="accordion-body collapse">
		      <div class="accordion-inner">
		        Agregar,Modificar
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c4">
		        Calles
		      </a>
		    </div>
		    <div id="c4" class="accordion-body collapse">
		      <div class="accordion-inner">
		        Agregar,Modificar
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#c5">
		        Lamparas
		      </a>
		    </div>
		    <div id="c5" class="accordion-body collapse">
		      <div class="accordion-inner">
		        Agregar,Modificar
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>