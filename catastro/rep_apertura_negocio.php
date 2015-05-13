<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	
	$dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." de ".date("Y");
	$hora=date("H:i");
	$id=$_GET['cod_con'];
	$idneg=$_GET['cod_neg'];

	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->arrayParameter=array("cod_con"=>$id,"fechaReporte"=>$fecha,"horaReporte"=>$hora,"cod_neg"=>$idneg);
	$archivo="../reportes/catastro/form_negocio.jrxml";
	$PHPJasperXML->load_xml_file($archivo);
	$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>