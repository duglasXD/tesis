<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cementerios Municipales</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="js/form_cementerio.js"></script>
</head>
<body onLoad="cargaCementerio()">
	<div class="well form-horizontal">
		<div class="span12">
			<legend>Cementerios Municipales</legend>
			<div class="control-group">
				<label class="control-label">Nombre del cementerio</label>
				<div class="controls">
					<input type="text" id="nom_cem" name="nom_cem" class="input-xlarge">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Dirección</label>
				<div class="controls">
					<textarea class="input-xlarge"  id="sit_en" name="sit_en"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Zona</label>
				<div class="controls">
					<label class="radio inline"><input type="radio" id="zon_cemU" name="zon_cem" value="Urbana" >Urbana</label>
					<label class="radio inline"><input type="radio" id="zon_cemR" name="zon_cem" value="Rural" checked >Rural</label>
				</div>
			</div>
			<div id="divAnadir" class="control-group"></div>
			<div class="form-actions" id="divActions">
				<a class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</a>
				<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
				<a class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
	</div>

	<div class="well span12">
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>Cementerio</th>
                    <th>Dirección</th>
 					<th>Zona</th>
 				</tr>
 			</thead>
 			<tbody id="cuerpo_com">
 			</tbody>
 		</table>
  </div>
	
</body>
</html>