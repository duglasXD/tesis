<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	
	switch ($_POST['caso']) {
		case '1':{
			$sql="INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir,ocu,est_civ) VALUES('$_POST[nom]','$_POST[ape1]','$_POST[ape2]','$_POST[sex]','$_POST[fec_nac]','$_POST[dui]','$_POST[nit]','$_POST[tel1]','$_POST[tel2]','$_POST[dep]','$_POST[mun]','$_POST[dir]','$_POST[ocu]','$_POST[est_civ]')";
			if(pg_query($sql)){
				echo "Ingresado exitosamente";
			}
			pg_close();
		}break;
		
		case '2':{
			$sql="INSERT INTO ca_sociedad(nom_jur,fec_cons,gir_jur,nit_jur,tel_jur,dir_jur) VALUES('$_POST[nom_jur]','$_POST[fec_cons]','$_POST[gir_jur]','$_POST[nit_jur]','$_POST[tel_jur]','$_POST[dir_jur]')";
			if (pg_query($sql)) {
				echo "Ingresado exitosamente";
			}
			pg_close();
		}break;
	}

?>