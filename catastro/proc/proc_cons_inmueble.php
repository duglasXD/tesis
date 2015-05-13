<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM rf_persona rp,ca_inmueble cn WHERE rp.cod_per=cn.cod_pro and (rp.nom ilike '%$_POST[bus_per]%' or rp.ape1 ilike '%$_POST[bus_per]%' or rp.ape2 ilike '%$_POST[bus_per]%')";
			}else{
				$sql="SELECT * FROM rf_persona rp,ca_inmueble cn WHERE rp.cod_per=cn.cod_con and rp.dui='$_POST[bus_per]' ";
			}
			enviaDatos($sql);
		}break;
		
		case '2':{
			$sql="SELECT * FROM ca_inmueble cn WHERE cn.med_inm BETWEEN '$_POST[mon_ini]' and '$_POST[mon_fin]'";
			enviaDatos($sql);
		}break;

		case '3':{
			$sql="SELECT * FROM ca_inmueble WHERE zon_inm='$_POST[buspor]'";
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
				'cod_inm'=>$obj->cod_inm,
				'zon_inm'=>$obj->zon_inm,
				'dir_inm'=>$obj->dir_inm,
				'med_inm'=>$obj->med_inm,
				'lim_nor'=>$obj->lim_nor,
				'lim_sur'=>$obj->lim_sur,
				'lim_est'=>$obj->lim_est,
				'lim_oes'=>$obj->lim_oes,
			);
		}
		echo ''.json_encode($datproy).'';
		pg_close();
	}

	
?>