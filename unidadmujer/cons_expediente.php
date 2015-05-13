<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Expediente</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="../css/jquery.jqplot.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/table.js"></script>
	<script src="../js/jquery.jqplot.js"></script>
	<script src="../js/plugins/jqplot.json2.js"></script>
	<script src="../js/plugins/jqplot.pieRenderer.js"></script>
	<script src="js/cons_expediente.js"></script>
</head>
<body>
	<legend style="margin-top:25px;">Consulta de Expediente</legend>
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#datGen">General</a></li>
			
			<!-- <li><a data-toggle="tab" href="#sitLab">Situación Laboral</a></li>
			<li><a data-toggle="tab" href="#famExt">Relaciones Familiares</a></li>
			<li><a data-toggle="tab" href="#relSoc">Relaciones Sociales</a></li>
			<li><a data-toggle="tab" href="#sitGen">Situación General</a></li>
			<li><a data-toggle="tab" href="#proGen">Problemática General</a></li> -->
		</ul>
		<div class="tab-content well">
			<div class="tab-pane active" id="datGen">
				<div class="controls">
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="sx">Sexo</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="ec">Estado Civil</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="ne">Nivel Educativo</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="ps">Pasatiempos</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="sl">Situación Laboral</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="de">Dependencia Económica (agresor)</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="ta">Tipo de Alimentación</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="ma">Maltratos</label></div>
					<div class="span2"><label class="radio inline"><input type="radio" name="radBus" value="as">Abuso Sexual</label></div>
				</div>
			</div>
		</div>
	</div> <!--fin del div tabbable-->
	<br>
	<div class="form-actions span12">
		<a class="btn btn-ppal offset3" id="btnGenerar"><img src="../img/icon-piechart.png" width="18px" height="18px"> Generar Gráfico</a>
		<a onclick="imprimeGrafica()" class="btn"><i class="icon-print"></i> Imprimir Gráfica</a>
		<a class="btn"><i class="icon-trash"></i> Limpiar filtros</a>
	</div>
	<br>
	<br>
	
	<div id= "migrafica" class="form-actions span10" width="100%" height="100%" ></div> 

	
	<!-- <div class="span12" id="tablaResultado">
		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					<th data-field='cod_pro'>Código</th>
					<th data-field='nom_pro'>Proyecto</th>
					<th data-field='des' data-visible="false">Descripción</th>
					<th data-field='ubi' data-visible="false">Ubicación</th>
					<th data-field='fec_ini'>Fecha de Inicio</th>
					<th data-field='fec_fin'>Fehca de Finalización</th>
					<th data-field='tip_fon'>Tipo de Fondos</th>
					<th data-field='mon_pro'>Fondos Propios</th>
					<th data-field='mon_ext'>Fondos Externos</th>
					<th data-field='pat' data-visible="false">Patrocinadores</th>
					<th data-field='est'>Estado</th>
				</tr>
		 	</thead>
		</table>
	</div> -->
	
</body>
</html>