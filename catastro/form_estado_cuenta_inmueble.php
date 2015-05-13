<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estado de Cuenta</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="js/form_estado_cuenta.js"></script>
</head>
<body>
	<form action="" name="form_inmueble" id="form_inmueble" class="well form-horizontal">
		<legend>Actualizar Estado de Cuenta</legend>
		<div class="control-group">
			<label class="control-label" for="nombre">Contribuyente</label>
			<div class="controls">
				<input type="text" placeholder="Nombre Apellido" id="nombre" disabled>
				<a href="#bus_per" data-toggle="modal" class="btn"><i class="icon-search"></i></a>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
				<input type="date">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Concepto</label>
			<div class="controls">
				<select>
					<option>Alumbrado</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nº Comprobante</label>
			<div class="controls">
				<input type="text">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Cargo</label>
			<div class="controls">
				<input type="text">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">Abono</label>
			<div class="controls">
				<input type="text">
			</div>
		</div>
			
			
		<div class="form-actions">
			<button class="btn"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</button>
			<button class="btn"><i class="icon-trash"></i> Limpiar</button>
			<button class="btn"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</form>

	<div>
		<legend>Estado de Cuenta</legend>
			<table class="table">
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
					<tr>
						<td>01/08/2014</td>
						<td>Alumbrado</td>
						<td>072563</td>
						<td>500</td>
						<td>200</td>
						<td>300</td>
					</tr>
					<tr>
						<td>01/08/2014</td>
						<td>Alumbrado</td>
						<td>072563</td>
						<td>500</td>
						<td>200</td>
						<td>300</td>
					</tr>
					<tr>
						<td>01/08/2014</td>
						<td>Alumbrado</td>
						<td>072563</td>
						<td>500</td>
						<td>200</td>
						<td>300</td>
					</tr>
				</tbody>
			</table>
	</div>

	<div class="modal hide fade" id="bus_per">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer" id="txtBusPer">
	  			<button class="btn" id="btnBusPer"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>DUI</th>
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
</body>
</html>