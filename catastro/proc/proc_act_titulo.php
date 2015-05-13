<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['radBusPer']=="DUI") {
				$sql="SELECT rp.* FROM rf_persona rp, ca_perpetuidad cp WHERE rp.dui='$_POST[txtBusPer]' and rp.cod_per=cp.cod_pro";
			}else{
				$sql="SELECT rp.* FROM rf_persona rp, ca_perpetuidad cp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and rp.cod_per=cp.cod_pro";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$dui= $row['dui'];
				$nit= $row['nit'];
				echo "
					<tr>
						<td style='display:none'>".$cod_per."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dui."</td>
						<td>".$nit."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT * FROM rf_persona rp,ca_perpetuidad cp WHERE rp.cod_per='$_POST[cod_per]' and rp.cod_per=cp.cod_pro";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
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
					'cod_tit'=>$obj->cod_tit,
					'nom_cem'=>$obj->nom_cem,
					'sit_en'=>$obj->sit_en,
					'zon_cem'=>$obj->zon_cem,
					'ancho'=>$obj->ancho,
					'largo'=>$obj->largo,
					'lim_nor'=>$obj->lim_nor,
					'lim_sur'=>$obj->lim_sur,
					'lim_est'=>$obj->lim_est,
					'lim_oes'=>$obj->lim_oes,
					'nic_aut'=>$obj->nic_aut,
					'clase'=>$obj->clase,
					'valor'=>$obj->valor,
					'num_rec'=>$obj->num_rec,
					'fec_rec'=>$obj->fec_rec
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;

		case '3':{
			$sql="UPDATE ca_perpetuidad SET ancho='$_POST[ancho]',largo='$_POST[largo]',lim_nor='$_POST[lim_nor]',lim_sur='$_POST[lim_sur]',lim_est='$_POST[lim_est]',lim_oes='$_POST[lim_oes]',nic_aut='$_POST[nic_aut]',clase='$_POST[clase]',valor='$_POST[valor]',num_rec='$_POST[num_rec]',fec_rec='$_POST[fec_rec]',cod_pro='$_POST[cod_per]' WHERE cod_tit='$_POST[cod_tit]'";
			if (pg_query($sql)) {
				if ($_POST['nic_aut']==1&&$_POST['fall1']!="") {
					pg_query("UPDATE ca_enterrado SET cod_per='$_POST[cod_per]',cod_tit='$row[0]',nom_fall='$_POST[fall1]'");
				}else{
					pg_query("INSERT INTO ca_enterrado VALUES('$_POST[cod_per]','$row[0]','$_POST[fall1]')");
				}
				if ($_POST['nic_aut']<=2&&$_POST['fall2']!="") {
					pg_query("UPDATE ca_enterrado SET cod_per='$_POST[cod_per]',cod_tit='$row[0]',nom_fall='$_POST[fall2]'");
				}else{
					pg_query("INSERT INTO ca_enterrado VALUES('$_POST[cod_per]','$row[0]','$_POST[fall2]')");
				}
				if ($_POST['fall3']!="") {
					pg_query("UPDATE ca_enterrado SET cod_per='$_POST[cod_per]',cod_tit='$row[0]',nom_fall='$_POST[fall3]'");
				}else{
					pg_query("INSERT INTO ca_enterrado VALUES('$_POST[cod_per]','$row[0]','$_POST[fall3]')");
				}
				if ($_POST['fall4']!="") {
					pg_query("UPDATE ca_enterrado SET cod_per='$_POST[cod_per]',cod_tit='$row[0]',nom_fall='$_POST[fall4]'");
				}else{
					pg_query("INSERT INTO ca_enterrado VALUES('$_POST[cod_per]','$row[0]','$_POST[fall4]')");
				}
				if ($_POST['fall5']!="") {
					pg_query("UPDATE ca_enterrado SET cod_per='$_POST[cod_per]',cod_tit='$row[0]',nom_fall='$_POST[fall5]'");
				}else{
					pg_query("INSERT INTO ca_enterrado VALUES('$_POST[cod_per]','$row[0]','$_POST[fall5]')");
				}
				echo "Actualizado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM ca_enterrado WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]'";
			$rs=pg_query($sql);
			$datfall=array();
			while ($obj=pg_fetch_object($rs)) {
				$datfall[]=array(
					'nom_fall'=>$obj->nom_fall,
				);
			}
			echo ''.json_encode($datfall).'';
			pg_close($conn);
		}break;
	}
?>