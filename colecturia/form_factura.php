<?php 
	include('./../php/conexion.php');
	$conexion=conectar();
	$consulta="SELECT codigo,nom_cue FROM co_impuesto";
	$resultado=pg_query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva Factura</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	
	<script type="text/javascript">
		$(".selectpicker").selectpicker();
	</script>
</head>
<body>
	<!-- Inicia formulario principal -->
	<form action="" class="well form-horizontal">

		<input type="hidden" name=>

		<div class="control-group">
			<label for="non_con" class="control-label">Nombre del Contribuyente</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="nom_con" id="nom_con"/>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="fec">Fecha</label>
			<div class="controls">
				<input type="date" name="fec" id="fec" value="<?php echo date('Y-m-d'); ?>">
			</div>
		</div>

		<div class="control-group">
			<label for="rub" class="control-label">Rubro</label>
			<div class="controls">
				<select name="det" id="det" class="selectpicker" data-width="285px" data-live-search="true" data-size="5" data-show-subtext="true">
					<?php
					while ($row=pg_fetch_array($resultado)){
						echo "
						<option data-subtext='$row[codigo]' value='$row[codigo]'>$row[nom_cue]</option>
						";
					}
					pg_close($conexion);
					?>
				</select>
			</div>
		</div>

		<div class="control-group">
			<label for="mon" class="control-label">Monto</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span>
					<input type="number" name="mon" id="mon" class="span2"/>
					<button type="button" name="agregar" id="agregar"><i class="icon-ok"></i> Agregar</button>
				</div>
			</div>
		</div>
		<div class="well">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Código</th>
						<th>Detalle</th>
						<th>Monto</th>
					</tr>
				</thead>
				<tbody id="detalles">
					<tr id="1">
						<td>12114</td>
						<td>5% FIESTAS PATRONALES</td>
						<td>0.0</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="prueva">

		</div>

		<div class="form-actions">
			<button type="button" class="btn"><i class="icon-ok"></i> Guardar</button>
			<button type="button" class="btn"><i class="icon-trash"></i> Limpiar</button>
			<button type="button" class="btn"><i class="icon-remove"></i> Cancelar</button>
		</div>
			
	</form>
	<!-- Termina formulario principal -->

	<!-- Inicia JavaScript -->
	<script type="text/javascript">

		$(document).ready(function(){
			$("#agregar").click(function(){

				// Agregar los datos del formulario a la tabla html
				var $fila = $("<tr></tr>");
				$fila.append("<td>" + $("#det").val() + "</td>");
				$fila.append("<td>" + $("option[value=" + $("#det").val() + "]").text() + "</td>");
				$fila.append("<td>" + $("#mon").val() + "</td>");
				$("#1").before($fila);
				//$fila.appendTo("#detalles");

				// Limpiar el formulario
				$("#mon").attr({value: ""});

			});

			/*$("#guardar").click(function(){
				var i = 0;
				var $datos $(".detalles").children();

			});*/

		});
	</script>
	<!-- Termina JavaScript -->
</body>
</html>