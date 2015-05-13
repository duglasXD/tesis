<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			$sql="INSERT INTO ca_cementerio(nom_cem,sit_en,zon_cem) VALUES('$_POST[nom_cem]','$_POST[sit_en]','$_POST[zon_cem]')";
			if (pg_query($sql)) {
				echo "Guardado exitosamente";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT * FROM ca_cementerio";
			$rs=pg_query($sql);
			$datcem = array();
			while ($obj=pg_fetch_object($rs)){
				$datcem[]=array(
					'cod_cem'=>$obj->cod_cem,
					'nom_cem'=>$obj->nom_cem,
					'sit_en'=>$obj->sit_en,
					'zon_cem'=>$obj->zon_cem
				);
			}
			echo ''.json_encode($datcem).'';
			pg_close($conn);
		}break;

		case '3':{
			if (pg_query("DELETE FROM ca_cementerio WHERE cod_cem='$_POST[cod_cem]'")) {
				echo "Eliminado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM ca_cementerio WHERE cod_cem='$_POST[cod_cem]'";
			$rs=pg_query($sql);
			$datcem = array();
			while ($obj=pg_fetch_object($rs)){
				$datcem[]=array(
					'cod_cem'=>$obj->cod_cem,
					'nom_cem'=>$obj->nom_cem,
					'sit_en'=>$obj->sit_en,
					'zon_cem'=>$obj->zon_cem
				);
			}
			echo ''.json_encode($datcem).'';
			pg_close($conn);
		}break;

		case '5':{
			$sql="UPDATE ca_cementerio SET nom_cem='$_POST[nom_cem]',sit_en='$_POST[sit_en]',zon_cem='$_POST[zon_cem]' WHERE cod_cem='$_POST[cod_cem]'";
			if (pg_query($sql)) {
				echo "Actualizado exitosamente";
			}
		}break;

	}
?>