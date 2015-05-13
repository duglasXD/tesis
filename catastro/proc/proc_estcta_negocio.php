<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{//Busca coincidencias de negocio
			if ($_POST['radBusNeg']=="Nombre") { //nombre de negocio
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE cn.cod_con=rp.cod_per and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t'";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cn.cod_con=cs.idsoc and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t'";
			}else{ //contribuyente
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE (rp.nom ilike '%$_POST[txtBusNeg]%' or rp.ape1 ilike '%$_POST[txtBusNeg]%' or rp.ape2 ilike '%$_POST[txtBusNeg]%') and (cn.cod_con=rp.cod_per) and cn.est_neg='t'";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cs.nom_jur ilike '%$_POST[txtBusNeg]%' and (cn.cod_con=cs.idsoc) and cn.est_neg='t'";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$cod_neg= $row['cod_neg'];
				$nom_neg= $row['nom_neg'];
				$dir_neg= $row['dir_neg'];
				echo "
					<tr>
						<td>".$nom_neg."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dir_neg."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaNeg('".$cod_per."','".$cod_neg."','$_POST[tipoPer]')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{//Devuelve los valores del negocio seleccionado
			if($_POST['tipoPer']=="N")
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.* FROM ca_negocio cn,rf_persona rp WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=rp.cod_per";
			else
				$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.* FROM ca_negocio cn,ca_sociedad cs WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=cs.idsoc";

			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datneg = array();
			while ($obj=pg_fetch_object($rs2)){
				$datneg[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'cod_neg'=>$obj->cod_neg,
					'nom_neg'=>$obj->nom_neg,
					'rub_neg'=>$obj->rub_neg,
					'zon_neg'=>$obj->zon_neg,
					'dep'=>$obj->dep,
					'mun'=>$obj->mun,
					'dir_neg'=>$obj->dir_neg,
					'med_neg'=>$obj->med_neg,
					'img_neg'=>$obj->img_neg,
					'est_neg'=>$obj->est_neg
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		}break;

		case '3':{
			$sql="SELECT * FROM co_neginm_imp WHERE cod_neginm='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datimp=array();
			while($obj=pg_fetch_object($rs)){
				$datimp[]=array(
					'cod_neginm'=>$obj->cod_neginm,
					'cod_imp'=>$obj->cod_imp
				);
			}
			echo ''.json_encode($datimp).'';
			pg_close($conn);
		}break;

		case '4':{ //devuelve toda la informacion de los impuestos asociados a un negocio
			$sql="SELECT cn.med_neg,ci.* FROM co_neginm_imp cni,ca_negocio cn,co_impuesto ci WHERE cni.cod_imp=ci.codigo and cni.cod_neginm='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datos=array();
			while($obj=pg_fetch_object($rs)){
				$datos[]=array(
					'med_neg'=>$obj->med_neg,
					'codigo'=>$obj->codigo,
					'nom_cue'=>$obj->nom_cue,
					'tip_cob'=>$obj->tip_cob,
					'cob_por'=>$obj->cob_por,
					'cob_fij'=>$obj->cob_fij,
					'cob_min'=>$obj->cob_min,
					'condonado'=>$obj->condonado
				);
			}
			echo ''.json_encode($datos).'';
			pg_close($conn);
		}break;


		case '5'://Envia notificacion a colecturia
		$fec_hor=date("Y-m-d H:i:s");
		$msj=$_POST['msj'];
		if(pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status) VALUES('$msj','$fec_hor','t')") or die("Error al ingresar")){
			echo "Guardado exitosamente";
		}
		pg_close($conn);	
			# code...
			break;
		
		default:
			# code...
			break;
	}

	
?>