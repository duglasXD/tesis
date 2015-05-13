<?
session_start();
include ("../php/conexion.php");
$conn=conectar();
switch ($_POST['caso']) {
case '1':
		$sql="select * from se_usuario";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='depto' id='sel_depto'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['id'];
				$nom= $row['usu'];

				echo "<option value=".$cod.">".$nom."</option>";
			}
			echo "</select>";
		}
		pg_close($conn);
		break;

		case '2':
			$sql=" select b.nom as nom,a.accion as accion,a.fecha as fecha,a.hora as hora from se_bitacora a inner join se_usuario b on a.id_usuario=b.id where b.id='$_POST[usuario]' and b.act='t' order by b.nom";
			$rs=pg_query($sql);
			if($rs){
				$datAct = array();
				while ($obj=pg_fetch_object($rs)){
					$datAct[]=array(
					'nom'=>$obj->nom,
					'accion'=>$obj->accion,
					'fecha'=>$obj->fecha,
					'hora'=>$obj->hora
				);
				}
			echo ''.json_encode($datAct).'';
			}	
			else{
				echo "Error ".$consulta;
			}
		break;
	}
?>