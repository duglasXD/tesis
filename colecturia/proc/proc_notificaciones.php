<?php  
	include('./../../php/conexion.php');
	$conn=conectar();
	$sql="SELECT * FROM co_notificacion";
	$rs=pg_query($sql);
	$lista=array();
	while ($obj=pg_fetch_object($rs)) {
		$lista[]=array(
			'id_not'=>$obj->id_not,
			'mensaje'=>$obj->mensaje,
			'fec_hor'=>$obj->fec_hor,
			'status'=>$obj->status
		);
	}
	echo ''.json_encode($lista).'';
	pg_close($conn);
?>