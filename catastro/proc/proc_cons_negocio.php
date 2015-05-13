<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and (rp.nom ilike '%$_POST[bus_per]%' or rp.ape1 ilike '%$_POST[bus_per]%' or rp.ape2 ilike '%$_POST[bus_per]%')";
			}else{
				$sql="SELECT * FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and rp.dui='$_POST[bus_per]' ";
			}
			enviaDatos($sql);
		}break;
		
		case '2':{
			$sql="SELECT * FROM ca_negocio cn WHERE cn.rub_neg ilike '%$_POST[buspor]%'";
			enviaDatos($sql);
		}break;

		case '3':{
			$sql="SELECT * FROM ca_negocio cn WHERE cn.zon_neg='$_POST[buspor]'";
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
				'nom_neg'=>$obj->nom_neg,
				'rub_neg'=>$obj->rub_neg,
				'zon_neg'=>$obj->zon_neg,
				'dir_neg'=>$obj->dir_neg,
				'med_neg'=>$obj->med_neg,
				'cod_con'=>$obj->cod_con,
			);
		}
		echo ''.json_encode($datproy).'';
		pg_close();
	}

	
?>