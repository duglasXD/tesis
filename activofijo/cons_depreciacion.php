<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>	
</head>
<body>
	<div class='well form-search'>
		<legend>Buscar Activo</legend>
		<div class='control-group'>
			<strong>Buscar por:</strong>
			<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
			<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Nombre</label>
		</div>
		<input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'/>
		<button type='submit' class='btn'><i class='icon-search'></i> Buscar</button>
	</div>
	<table class="table table-bordered">
		<thead>
			<th>Año</th>
			<th>Depreciación Anual</th>
			<th>Depreciación Acumulada</th>
			<th>Valor en Libros</th>
		</thead>
	</table>
</body>
</html>