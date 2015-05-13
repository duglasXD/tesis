<?php  
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{ //Busca a una persona y carga las coincidencias
			if ($_POST['radBusPer']=="DUI") {
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
				}
			}
			if ($_POST['radBusPer']=="NIT") {
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona WHERE nit='$_POST[txtBusPer]'";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nit_jur='$_POST[txtBusPer]'";
				}
			}
			if($_POST['radBusPer']=="Nombre"){
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona rp WHERE rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%'";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nom_jur ilike '%$_POST[txtBusPer]%'";
				}
			}
			if($_POST['radTip']=="N"){
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
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','N')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}else{
				$rs=pg_query($sql) or die("Error en la busqueda");
				$numRow=pg_num_rows($rs);
				for ($i=0; $i < $numRow; $i++) { 
					$row=pg_fetch_array($rs,$i);
					$cod_per= $row['cod_per'];
					$nom= $row['nom'];
					$nit= $row['nit'];
					echo "
						<tr>
							<td style='display:none'>".$cod_per."</td>
							<td>".$nom."</td>
							<td>".$nit."</td>
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','J')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}
			pg_close($conn);
		}break;

		case '2':{//Devuelve los datos de una persona seleccionada en la busqueda
			if ($_POST['tipo']=="N") {
				$sql="SELECT cod_per,nom,ape1,ape2 FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
			}else{
				$sql="SELECT idSoc as cod_per,nom_jur as nom FROM ca_sociedad WHERE idSoc='$_POST[cod_per]'";
			}
			
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;

		case '3':{//Guarda a la BD
			//Se obtiene el id del nuevo negocio para vincularlo con la imagen del local
			$rsbus=pg_query("SELECT MAX(cod_neg) as cod_neg FROM ca_negocio");
			$row=pg_fetch_array($rsbus,0);
			$cod_neg=$row['cod_neg'];
			if ($cod_neg=="") {
				$cod_neg='1';
			}else{
				$cod_neg++;
			}
			//Cambiamos nombre al archivo para guardarlo
			$file_name=$_FILES[img_neg][name];
			$ext=substr($file_name, strlen($file_name)-4);
			$new_name=$cod_neg.$ext;

			//comprobamos si existe un directorio para subir el archivo
    		//si no es así, lo creamos
    		if(!is_dir("imagenes/")) {
        		mkdir("imagenes/", 0777);}
        	if ($file_name!="") {
        		if(move_uploaded_file($_FILES[img_neg][tmp_name], "imagenes/".$new_name)){
        			$sql="INSERT INTO ca_negocio(nom_neg,rub_neg,zon_neg,dep,mun,dir_neg,med_neg,img_neg,est_neg,tip_con,cod_con) VALUES('$_POST[nom_neg]','$_POST[rub_neg]','$_POST[zon_neg]','$_POST[dep]','$_POST[mun]','$_POST[dir_neg]','$_POST[med_neg]','$new_name','t','$_POST[tipoPer]','$_POST[cod_con]')";
				}else{echo "Error al subir el archivo";}
        	}else{
        		$sql="INSERT INTO ca_negocio(nom_neg,rub_neg,zon_neg,dep,mun,dir_neg,med_neg,img_neg,est_neg,tip_con,cod_con) VALUES('$_POST[nom_neg]','$_POST[rub_neg]','$_POST[zon_neg]','$_POST[dep]','$_POST[mun]','$_POST[dir_neg]','$_POST[med_neg]','','t','$_POST[tipoPer]','$_POST[cod_con]')";
        	}
			if(pg_query($sql) or die("Error al ingresar")){
				$cod_imp=$_POST['imp'];
				for ($i=0; $i < count($cod_imp); $i++) { 
					pg_query("INSERT INTO co_neginm_imp VALUES('$cod_neg','$cod_imp[$i]')");
				}
				$respuesta[0]=array(
					'cod_neg'=>"$cod_neg",
					'exito'=>'1'
				);
				
				echo ''.json_encode($respuesta).'';
			}
			pg_close($conn);
		}break;
	}
?>