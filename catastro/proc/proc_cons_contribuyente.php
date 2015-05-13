<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[bus_proy]%' or ape1 ilike '%$_POST[bus_proy]%' or ape2 ilike '%$_POST[bus_proy]%'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[bus_proy]' ";
			}
			enviaDatos($sql);
		}break;
		
		case '2':{
			$sql="SELECT * FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and cn.nom_neg ilike '%$_POST[buspor]%'";
			enviaDatos($sql);
		}break;

		case '3':{
			$sql="SELECT * FROM rf_persona rp,ca_inmueble ci WHERE rp.cod_per=ci.cod_pro and ci.cod_inm='$_POST[buspor]'";
			enviaDatos($sql);
			pg_close();
		}break;

	
	}

	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datproy = array();
		while ($obj=pg_fetch_object($rs)){
			$datproy[]=array(
				'cod_per'=>$obj->cod_per,
				'nom'=>$obj->nom,
				'ape1'=>$obj->ape1,
				'ape2'=>$obj->ape2,
				'sex'=>$obj->sex,
				'fec_nac'=>$obj->fec_nac,
				'dui'=>$obj->dui,
				'nit'=>$obj->nit,
				'tel1'=>$obj->tel1,
				'tel2'=>$obj->tel2,
				'dir'=>$obj->dir,
				'nom_neg'=>$obj->nom_neg,
				'cod_inm'=>$obj->cod_inm
			);
		}
		echo ''.json_encode($datproy).'';
		pg_close();
	}

?>