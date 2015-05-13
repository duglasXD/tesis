<?php
	session_start();
	include ("../php/conexion.php");
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':
			pg_query($conn,"BEGIN");
			$sql="insert into se_usuario(nom,mail,usu,contra,niv,act) values('$_POST[nom]','$_POST[cor]','$_POST[usu]','".sha1(md5(trim($_POST['usu']).trim($_POST['contra'])))."','$_POST[niv]','t')";
			pg_query($sql)or die("Error en la búsqueda");
			$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso un nuevo usuario ($_POST[usu]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if($rs){ 
				echo "exito";
				pg_query($conn,"COMMIT");
			}else{
				echo "Error, al guardar el usuario";
				pg_query($conn,"ROLLBACK");
			}
		break;
	}
	pg_close($conn);
?>