<?php
	session_start();
	
	if($_POST["accion"] == "inicializar"){
		inicializar();	
	}

	if($_POST["accion"] == "agregar_detalle"){
		agregarDetalle();
	}

	if($_POST["accion"] == "guardar_factura"){
		guardarFactura();
	}

	function inicializar(){
		// Limpiar(Borrar) los arrays a utilizar
		unset($_SESSION["factura"]);
		unset($_SESSION["contador"]);
		unset($_SESSION["detalle"]);

		// Inicializar el encabezado de la factura
		//$_SESSION["factura"]["nombre"] = $_POST["nom_con"];
		$_SESSION["factura"]["monto"] = 0;

		// Inicializar el contador en 0, indicando que se agregará la primer fila de detalle en en indice cero
		$_SESSION["contador"] = 0;

		// Agregar la primer fila del detalle que es el impuesto de fiestas patronales
		$_SESSION["detalle"][0]["codigo"] = "12114";
		$_SESSION["detalle"][0]["descripcion"] = "5% FIESTAS PATRONALES";
		$_SESSION["detalle"][0]["total"] = 0;

		echo json_encode($_SESSION["detalle"]);
	}

	function agregarDetalle(){

		// Aumentar el contador en 1 indicando que se agregará una nueva fila de detalle
		$_SESSION["contador"]++;

		// Mover la fila de fiestas patronales a la ultima posicion
		$_SESSION["detalle"][$_SESSION["contador"]]["codigo"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["codigo"];
		$_SESSION["detalle"][$_SESSION["contador"]]["descripcion"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["descripcion"];
		$_SESSION["detalle"][$_SESSION["contador"]]["total"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["total"];

		// Agregar una fila de detalle en la penultima posición
		$_SESSION["detalle"][$_SESSION["contador"]-1]["codigo"] = $_POST["codigo"];
		$_SESSION["detalle"][$_SESSION["contador"]-1]["descripcion"] = $_POST["descripcion"];
		$_SESSION["detalle"][$_SESSION["contador"]-1]["total"] = $_POST["total"];

		// Actualizar el valor de fiestas patronales
		$_SESSION["detalle"][$_SESSION["contador"]]["total"] += round($_POST["total"] * 0.05, 2);

		//actualizar el monto total (sumar el monto del detalle y el impuesto de fiestas patronales)
		$_SESSION["factura"]["monto"] += $_POST["total"];
		$_SESSION["factura"]["monto"] += round($_POST["total"] * 0.05, 2);

		echo json_encode($_SESSION["detalle"]);
	}

	function guardarFactura(){
		require_once("../php/conexion.php");
		$conexion = conectar();
		if($_POST["cod_con"] == "") $_POST["cod_con"] = "null";
		
		$consulta = "INSERT INTO co_factura (fec, nom_con, cod_con, mon_fac, est) 
		values('". date("Y-m-d") ."', '$_POST[nom_con]', $_POST[cod_con], '". 
		$_SESSION["factura"]["monto"] ."', 'true')";
		echo $consulta;
	}
?>