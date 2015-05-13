<?php 
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['opcion']) {
		case 'sx':
			$sql="SELECT sex,count(*) as persona FROM rf_persona group by sex";
			enviarDatos($sql);
		break;
		
		case 'ec':
			$sql="SELECT est_civ,count(*) FROM rf_persona group by est_civ";
			enviarDatos($sql);
		break;
		
		case 'ne':
			$sql="SELECT niv_edu,count(*) FROM um_expediente group by niv_edu";
			enviarDatos($sql);
		break;

		case 'ps':
			$sql="SELECT oci_ded,count(*) FROM um_expediente group by oci_ded";
			enviarDatos($sql);
		break;

		case 'sl':
			$sql="SELECT baj_con,count(*) FROM um_expediente group by baj_con";
			enviarDatos($sql);
		break;

		case 'de':
			$sql="SELECT dep_eco_agr,count(*) FROM um_expediente group by dep_eco_agr";
			enviarDatos($sql);
		break;

		case 'ta':
			$sql="SELECT com,count(*) FROM um_expediente group by com";
			enviarDatos($sql);
		break;

		case 'ma':
			$sql="SELECT suf_mal,count(*) FROM um_expediente group by suf_mal";
			enviarDatos($sql);
		break;

		case 'as':
			$sql="SELECT suf_abu_sex,count(*) FROM um_expediente group by suf_abu_sex";
			enviarDatos($sql);
		break;
	
	}

	function enviarDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datexp = array();
		$i=0;
		while ($row=pg_fetch_array($rs)){
			$datexp[$i]=array('label'=>$row[0],'value'=>$row[1]);
			$i++;
		}
		echo ''.json_encode($datexp).'';
	}
?>