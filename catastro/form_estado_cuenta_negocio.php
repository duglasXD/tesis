<?php 
	include('./../php/conexion.php');
	$conn=conectar();
	$sql="SELECT codigo,nom_cue FROM co_impuesto";
	$rs=pg_query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estado de Cuenta</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script src="js/form_estado_cuenta_negocio.js"></script>
</head>
<body>
	<legend style="margin-top:25px">Actualizar Estado de Cuenta</legend>
	<div class="well form-horizontal">
		<a href="#bus_neg" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Negocio</a>
		<br><br>
		<input type="hidden" id="cod_neg">
		<input type="hidden" id="cod_con">
		<div class="control-group span6">
			<label class="control-label" for="nombre">Contribuyente</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="nombre" disabled>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="nom_neg">Negocio</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="nom_neg" disabled>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="dir_neg">Dirección</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="dir_neg" disabled>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="med_neg">Mts. a calle</label>
			<div class="controls">
				<div class="input-append">
					<input type="number" min="0" class="input-mini" id="med_neg" name="med_neg" value="0" disabled>
					<span class="add-on">Mts.</span>
				</div>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Concepto</label>
			<div class="controls" id="concepto">
				<select name="imp[]" id="imp" class="selectpicker" data-width="285px" multiple data-live-search="true" title="Seleccione una o varias opciones" data-size="5" multiple data-selected-text-format="count>5">
				<?php
					while ($row=pg_fetch_array($rs)) {
						echo "<option data-subtext='$row[1]' value='$row[0]'>$row[0]</option>";
					}
					pg_close($conn);
				?>
				</select>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Mes a pagar</label>
			<div class="controls">
				<select id="mes_pag">
					<option value="Enero">Enero</option>
					<option value="Febrero">Febrero</option>
					<option value="Marzo">Marzo</option>
					<option value="Abril">Abril</option>
					<option value="Mayo">Mayo</option>
					<option value="Junio">Junio</option>
					<option value="Julio">Julio</option>
					<option value="Agosto">Agosto</option>
					<option value="Septiembre">Septiembre</option>
					<option value="Octubre">Octubre</option>
					<option value="Noviembre">Noviembre</option>
					<option value="Diciembre">Diciembre</option>
				</select>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Fecha de factura</label>
			<div class="controls">
				<input type="date" id="fecha">
			</div>
		</div>
		
		
		<div class="control-group span5">
			<label class="control-label">Moras</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span>
					<input type="text" class="input-medium" id="moras" name="moras" value="0.00" disabled>
				</div>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Multas</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span>
					<input type="text" class="input-medium" id="multas" name="multas" value="0.00" disabled>
				</div>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Total a pagar</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span>
					<input type="text" class="input-medium" id="total" name="total" value="0.00" disabled>
				</div>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Serie de factura</label>
			<div class="controls">
				<input type="text" id="serie">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Correlativo de factura</label>
			<div class="controls">
				<input type="text" id="corr">
			</div>
		</div>
		<div class="form-actions offset2">
			<button class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</button>
			<button class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</button>
			<button class="btn"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</div>
	

	<div class="">
		<legend>Estado de Cuenta</legend>
			<table class="table" id="tabla_cuenta">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Concepto</th>
						<th>Nº Comprobante</th>
						<th>Cargo</th>
						<th>Abono</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
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

</body>
</html>