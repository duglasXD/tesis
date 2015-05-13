<?php 
	include('./../../php/conexion.php');
	$conn=conectar();		
	if(pg_query("INSERT INTO co_impuesto VALUES('$_POST[codigo]','$_POST[nom_cue]','$_POST[des_cue]','$_POST[tip_cob]','$_POST[cob_por]','$_POST[cob_fij]','$_POST[cob_min]','f')")){
		echo "Guardado exitosamente";
	};
	pg_close($conn);
?>