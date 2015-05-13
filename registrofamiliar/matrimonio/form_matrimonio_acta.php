<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de Actas de Matrimonio</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
	</head>
	<body>

		<div id="mensajes">
			<!-- Area para los mensajes devueltos por el script-->
		</div>

		<!-- Inicia Formulario Principal -->
		<form class="form form-horizontal well" name="form_matrimonio_acta" id="form_matrimonio_acta" action="" method="POST">
			<legend>Registro de Actas de Matrimonio</legend>

			<input type="hidden" name="accion" value="guardar-matrimonio-acta">
			<input type="hidden" name="cod_eso" id="cod_eso" value="">
			<input type="hidden" name="cod_esa" id="cod_esa" value="">

			<div class="row-fluid">
				<div class="control-group span3">
					<label class="control-label" for="ano_lib">Año</label>
					<div class="controls">
						<input type="number" class="input-mini" name="ano_lib" id="ano_lib" value="<?php echo date("Y") ?>">
					</div>
				</div>

				<div class="control-group span3 offset1">
					<label class="control-label" for="num_lib" style="text-align: right;">Libro No.&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_lib" id="num_lib" value="<?php echo date("Y") - 1961 ?>">
					</div>
				</div>

				<div class="control-group span3 offset1">
					<label class="control-label" for="num_tom" style="text-align: right;">Tomo No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_tom" id="num_tom" value="1">
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="control-group span3">
					<label class="control-label" for="num_pag">Página No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_pag" id="num_pag">
					</div>
				</div>

				<div class="control-group  span3 offset1">
					<label class="control-label" for="num_act" style="text-align: right;">Acta No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_act" id="num_act">
					</div>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="button" class="btn" name="btn-buscar-esposo" id="btn-buscar-esposo" data-toggle="modal" href="#buscar-esposo"><i class="icon-search"></i> Buscar Esposo</button>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="nom_eso">Nombre del Esposo</label>
				<div class="controls">
					<input type="text" class="span3" name="nom_eso" id="nom_eso">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="ape1_eso">Primer apellido del Esposo</label>
				<div class="controls">
					<input type="text" class="span3" name="ape1_eso" id="ape1_eso"> 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="ape2_eso">Segundo apellido del Esposo</label>
				<div class="controls">
					<input type="text" class="span3" name="ape2_eso" id="ape2_eso">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="button" class="btn" name="btn-buscar-esposa" name="btn-buscar-esposa" data-toggle="modal" href="#buscar-esposa"><i class="icon-search"></i> Buscar Esposa</button>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="nom_esa">Nombre de la Esposa</label>
				<div class="controls">
					<input type="text" class="span3" name="nom_esa" id="nom_esa">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="ape1_esa">Primer apellido de la Esposa</label>
				<div class="controls">
					<input type="text" class="span3" name="ape1_esa" id="ape1_esa">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="ape2_esa">Segundo apellido de la Esposa</label>
				<div class="controls">
					<input type="text" class="span3" name="ape2_esa" id="ape2_esa">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="fec_mat">Fecha del Matrimonio</label>
				<div class="controls">
					<input type="date" name="fec_mat" id="fec_mat">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="cue">Cuepo del Acta</label>
				<div class="controls">
					<textarea class="input-xxlarge" name="cue" id="cue" rows="20"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="esc_libx">Imagen Escaneada</label>
				<div class="controls">
					<input type="file" class="input-file" name="esc_libx" id="esc_libx">
					<input type="hidden" name="esc_lib" id="esc_lib">
				</div>
			</div>

			<div class="form-actions">
				<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
				<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
			</div>
		</form>
		<!-- Termina Formulario Principal -->

		<!-- Inicia Formulario modal de búsqueda del esposo -->
		<div class="modal hide fade" id="buscar-esposo">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Esposo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-search" name="form_buscar_esposo" id="form_buscar_esposo" action="" method="POST">
						<div class="control-group">
							<strong>Buscar por</strong><br>
							<label class="radio inline">
								<input type="radio" name="nombre" value="nombre" checked>Nombre
							</label>
						</div>
						<input type="hidden" name="accion" value="buscar-esposo">
						<input type="text" class="search-query" style="width : 250px;" name="nom">
						<button type="button" class="btn" name="btn2-buscar-esposo" id="btn2-buscar-esposo"><i class="icon-search"></i> Buscar</button>
					</form>
				</div>
				<div id="resultado-buscar-esposo"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de búsqueda del esposo -->

		<!-- Inicia Formulario modal de búsqueda de la esposa -->
		<div class="modal hidde fade" id="buscar-esposa">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Esposa</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-search" name="form_buscar_esposa" id="form_buscar_esposa" action="" method="POST">
						<div class="control-group">
							<strong>Buscar por</strong><br>
							<label class="radio inline">
								<input type="radio" name="nombre" checked>Nombre
							</label>
						</div>
						<input type="hidden" name="accion" value="buscar-esposa">
						<input type="text" class="search-query" style="whidth : 250px;" name="nom">
						<button type="button" class="btn" name="btn2-buscar-esposa" id="btn2-buscar-esposa"><i class="icon-search"></i> Buscar</button>
					</form>
				</div>
				<div id="resultado-buscar-esposa"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de búsqueda de la esposa -->

		<!-- Inicia código javascript -->
		<script type="text/javascript">
			/* Inicia codigo de configuración Inicial */
			$(document).ready(function(){
				/* Inicia código para subir la imagen inmediatamente despues de seleccionarla*/				
				$("#esc_libx").change(function(){
					var num_lib = $("#num_lib").val();
					var num_act = $("#num_act").val();
					$("#esc_lib").attr({value : "mat_act_" + num_lib + "_" + num_act + ".jpg" });
					
					$.ajax({
						type : "POST",
						url : "../img/proc_subir_imagen.php",
						data : new FormData($("#form_matrimonio_acta")[0]),
						cache : false,
						contentType : false,
						processData : false
					});
				});
				/* Termina código para subir la imagen inediatamente despues de seleccionarla */

			});
			/* Termina código de configuración Inicial */

			/* Inicia código para funcionalidad del botón guardar del formulario prinipal */
			$(function(){
				$("#btn-guardar").click(function(){
					if (confirm("¿Esta seguro de querer guardar estos datos?")){
						$.ajax({
							type : "POST",
							url : "proc_matrimonio_acta.php",
							data : $("#form_matrimonio_acta").serialize(),
							success : function(data){
								$("#mensajes").html(data);
							}
						});
					}
				});
			});
			/*  Termina código para funcionalidad del boton guardar del formulario principal */

			/* Inicia código para la funcionalidad del boton buscar del formulario de búsqueda del esposo */
			$(function(){
				$("#btn2-buscar-esposo").click(function(){
					$.ajax({
						type : "POST",
						url : "proc_matrimonio_acta.php",
						data : $("#form_buscar_esposo").serialize(),
						success : function(data){
							$("#resultado-buscar-esposo").html(data);
						}
					});
				});
			});
			/* Termina código para la funcionalidad del boton buscar del forulario  de búsqueda del padre */

			/* Inicia código para la funcionalidad del boton buscar del formulario de búsqueda de la esposa */
			$(function(){
				$("#btn2-buscar-esposa").click(function(){
					$.ajax({
						type : "POST",
						url : "proc_matrimonio_acta.php",
						data : $("#form_buscar_esposa").serialize(),
						success : function(data){
							$("#resultado-buscar-esposa").html(data);
						}
					});
				});
			});
			/* Termina código para la funcionalidad del boton buscar del formulario de búsqueda de la esposa */

			/* Inicia función para cargar los datos del esposo */
			function cargarEsposo(esposo)
			{
				$("#cod_eso").attr({value: esposo.cod_per});
				$("#nom_eso").attr({value: esposo.nom});
				$("#ape1_eso").attr({value: esposo.ape1});
				$("#ape2_eso").attr({value: esposo.ape2});
			}
			/* Termina función para cargar los datos de la esposo */

			/* Inicia función para cargar los datos de la esposa */
			function cargarEsposa(esposa)
			{
				$("#cod_esa").attr({value: esposa.cod_per});
				$("#nom_esa").attr({value: esposa.nom});
				$("#ape1_esa").attr({value: esposa.ape1});
				$("#ape2_esa").attr({value: esposa.ape2});
			}
			/* Termina función para cargar los datos de la esposa */

			/* Inicia fución para cambiar el valor del imput esc_lib */
			function cambio(){
				var input = $("#esc_libx").val();
				input = input.replace("C:\\fakepath\\","");
				$("#esc_lib").attr({value : input });
			}
			/* Termina función para cambiar el valor del imput esc_lib */

		</script>
		<!-- Termina código javascript -->

	</body>
</html>