<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Traspaso de Negocio</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="./../css/fileinput.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/fileinput.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="js/form_traspaso.js"></script>
</head>
<body>
	<div class="well form-horizontal">
		<div class="span12">
			<legend>Traspaso de Negocio</legend>
			<div class="span7">
				<a href="#bus_neg" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Negocio</a>
				<br><br>
				<input type="hidden" id="cod_neg">
				
				<div class="control-group">
					<label class="control-label">Nombre del negocio</label>
					<div class="controls">
						<input type="text" class="span3" id="nom_neg" placeholder="del negocio o empresa" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Giro</label>
					<div class="controls">
						<input type="text" class="span3" id="rub_neg" placeholder="a que se dedica la empresa" readonly>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Zona</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" id="zon_negU" name="zon_neg" value="Urbana">Urbana</label>
						<label class="radio inline"><input type="radio" id="zon_negR" name="zon_neg" value="Rural" checked>Rural</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="dep">Departamento</label>
					<div class="controls">
						<select name="dep" id="dep" onChange="cargarMunicipios('dep','mun')" readonly>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="mun">Municipio</label>
					<div class="controls">
						<select id="mun" name="mun" readonly>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Direcci&oacute;n</label>
					<div class="controls">
						<textarea class="input-xlarge" id="dir_neg" readonly></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Metros a calle</label>
					<div class="controls">
						<div class="input-append">
							<input type="number" min="0" class="input-mini" id="med_neg" value="0" readonly>
							<span class="add-on">Mts.</span>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Contribuyente</label>
					<div class="controls">
						<input type="hidden" id="cod_con" name="cod_con">
						<input type="hidden" id="tipoPer" name="tipoPer">
						<input type="text" class="span3" id="nom_per" name="nom_per" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Nuevo Contribuyente</label>
					<div class="controls">
						<input type="hidden" id="cod_pnu">
						<input type="text" class="span3" id="nom_nue" readonly>
						<a href="#bus_per" data-toggle="modal" class="btn"><i class="icon-search"></i></a>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Fecha de Traspaso</label>
					<div class="controls">
						<input type="date" id="fec_tra" value="<?php echo date("Y-m-d"); ?>">
					</div>
				</div>
			</div>
			
			<div class="span4">
				<ul class="thumbnails">
					<li class="span4" id="miniatura">
						<label>Fotografía del Negocio</label>
						<input type="file" id="img_neg" class="file" data-show-upload="false">
					</li>
				</ul>
			</div>
		</div>
		<div class="span12">
			<div class="form-actions">
				<a class="btn" id="btnActualizar"><i class="icon-refresh"></i> Actualizar</a>
				<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
				<a class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
	</div>

	<div class="modal hide fade" id="bus_neg">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Negocio</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group offset1">
					<label class="radio inline"><input type="radio" name="radTip" id="radTip" value="N" checked>Persona Natural</label>
					<label class="radio inline"><input type="radio" name="radTip" id="radTip" value="J">Persona Jurídica</label>
				</div>
			</div>
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" id="radBusNeg" name="radBusNeg" value="Nombre" checked>Nombre del Negocio</label>
					<label class="radio inline"><input type="radio" id="radBusNeg" name="radBusNeg" value="Contribuyente">Contribuyente</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusNeg" id="txtBusNeg">
	  			<button class="btn" id="btnBusNeg"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>Contribuyente</th>
					<th>Dirección</th>
					<th>Añadir</th>
				</thead>
				<tbody id="cuerpo_neg">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<!-- <a href="#" class="btn btn-primary"><i class="icon-plus"></i> Añadir</a> -->
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

	<div class="modal hide fade" id="bus_per">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group offset1">
					<label class="radio inline"><input type="radio" name="per" id="per" value="N" checked>Persona Natural</label>
					<label class="radio inline"><input type="radio" name="per" id="per" value="J">Persona Jurídica</label>
				</div>
			</div>
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPerD" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPerN" value="NIT">NIT</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer" id="txtBusPer">
	  			<button class="btn" id="btnBusPer"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered" id="tabla_col">
				<thead>
					<th>Nombre</th>
					<th id="thd">DUI</th>
					<th>NIT</th>
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

	<script>
		$("#img_neg").fileinput({
			initialPreview:["<img src='./../img/no_imagen.png' class='file-preview-image'>"],
			showCaption:false,
			allowedFileExtensions: ["jpg"],
		});
		$("#img_neg").fileinput("disable");
	</script>

</body>
</html>