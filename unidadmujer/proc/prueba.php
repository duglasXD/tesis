<?php 
include('./../../php/conexion.php');
	$conn=conectar();
	$sql="SELECT sex,count(*) as persona FROM rf_persona group by sex";
			enviarDatos($sql);
			function enviarDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datexp = array();
		$i=0;
		while ($row=pg_fetch_array($rs)){
			$datexp[$i]=array('a'=>$row[0],'b'=>$row[1]);
			$i++;
		}
		echo ''.json_encode($datexp).'';
	}
	 ?>
