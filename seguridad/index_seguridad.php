<?php 
	session_start();
	if($_SESSION['ta02_nivel']!="6"){//deja entrar si es activo fijo
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=6";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguridad</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/funciones"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <link   href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link   href="jquery.fileDownload-master/src/Content/Site.css" rel="stylesheet" type="text/css" />
    <script src="jquery.fileDownload-master/src/Scripts/jquery.fileDownload.js" type="text/javascript"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shCore.js"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shBrushJScript.js"></script>
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/shBrushXml.js"></script>
    <link   type="text/css" rel="stylesheet" href="jquery.fileDownload-master/src/Content/shCoreDefault.css" />
    <script type="text/javascript" src="jquery.fileDownload-master/src/Scripts/Support/jquery.gritter.min.js"></script>
    <link   type="text/css" rel="stylesheet" href="jquery.fileDownload-master/src/Content/jquery.gritter.css" />
	<script>
		function cs(){
			//alert("hola mono");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET','../seguridad/ajaxseguridad.php?caso=borrar',true);
	        xmlhttp.send();
			window.location="../index.php";
		}
		function backup(){
            $.ajax({
                type:"post",
                url: "back_rest.php",
                data:{actionButton:'Export'},
                success:function(responseText){
                    $.fileDownload(responseText);
                    //  $(function () {
                    //     var $preparingFileModal = $("#preparing-file-modal");
                    //     $preparingFileModal.dialog({ modal: true });
                    //     $.fileDownload(responseText,{
                    //         successCallback: function (url) {
                    //             $preparingFileModal.dialog('close');
                    //         },
                    //         failCallback: function (responseHtml, url) {
                    //             $preparingFileModal.dialog('close');
                    //             $("#error-modal").dialog({ modal: true });
                    //         }
                    //     });
                    //     return false; //this is critical to stop the click event which will trigger a normal file download!
                    // });
                }
            });    
        }
	</script>
</head>
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_se.png) no-repeat;" id="banner"></header>
		<!-- <div class="span1 offset4"><img src="../img/application-pgp-signature.png" alt="" ></div>
		<div class="span3"><h1 style="color:white;text-shadow:0 1px 0 black;">Seguridad</h1></div>
		<div class="span1"><img src="../img/stock_lock.png" alt=""></div> -->
	

	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_seguridad.php"> <i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_nuevo_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Registrar usuario</a></li>
								<li><a href="form_act_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Actualizar datos de usuario</a></li>
								<li><a href="form_ab_usuario.php"><i class="icon-list-alt"></i> Alta/Baja usuario</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Backups<b class="caret"></b></a>
							<ul class="dropdown-menu">
									<li><a style="cursor:pointer;" onclick="backup();"><i class="icon-download"></i> Hacer copia de seguridad</a></li>
                <li><a href="form_restaurar.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-upload"></i> Restaurar copia de seguridad</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bit&aacute;cora<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="bitacora.php" target="centro" onclick="getElementById('centro').height='980px'"><i class="icon-eye-open"></i> Registro de actividad</a></li>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li><a href="javascript:cs()"><i class="icon-off icon-white"></i> Cerrar Sesión</a></li>
          			</ul>
			</div>
		</div>
	</div>
	<div class="container" style="width:1024px;">
		<object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no"></object>
	</div>	
	<footer></footer>
</body>
</html>

<?php

function dl_file($file){
   if (!is_file($file)) { die("<b>404 File not found!</b>"); }
   $len = filesize($file);
   $filename = basename($file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));
   $ctype="application/force-download";
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
   header("Content-Type: $ctype");
   $header="Content-Disposition: attachment; filename=".$filename.";";
   header($header );
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   @readfile($file);
   exit;
}

$action  = $_POST["actionButton"];
$ficheiro=$_FILES["path"]["name"];
switch ($action) {
    case "Import":
      $dbname = "teste"; //database name
      $dbconn = pg_pconnect("host=localhost port=5432 dbname=$db_alcaldia 
user=postgres password=root"); //connectionstring
      if (!$dbconn) {
        echo "Can't connect.\n";
        exit;
      }
      $back = fopen($ficheiro,"r");
      $contents = fread($back, filesize($ficheiro));
      $res = pg_query(utf8_encode($contents));
      echo "Upload Ok";
      fclose($back);
  break;
  case "Export":
  $dbname = "Backup_db_alcaldia".date('d.m.Y.G.i.s'); //database name
  $dbconn = pg_pconnect("host=localhost port=5432 dbname=db_alcaldia user=postgres password=root"); //connectionstring
  if (!$dbconn) {
    echo "Can't connect.\n";
  exit;
  }
  $back = fopen("$dbname.sql","w");
  $res = pg_query(" select relname as tablename
                    from pg_class where relkind in ('r')
                    and relname not like 'pg_%' and relname not like 
'sql_%' order by tablename");
  $str="";
  while($row = pg_fetch_row($res))
  {
    $table = $row[0];
    $str .= "\n--\n";
    $str .= "-- Estrutura da tabela '$table'";
    $str .= "\n--\n";
    $str .= "\nDROP TABLE $table CASCADE;";
    $str .= "\nCREATE TABLE $table (";
    $res2 = pg_query("
    SELECT  attnum,attname , typname , atttypmod-4 , attnotnull 
,atthasdef ,adsrc AS def
    FROM pg_attribute, pg_class, pg_type, pg_attrdef WHERE 
pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND pg_class.oid=adrelid AND 
adnum=attnum
    AND atthasdef='t' AND lower(relname)='$table' UNION
    SELECT attnum,attname , typname , atttypmod-4 , attnotnull , 
atthasdef ,'' AS def
    FROM pg_attribute, pg_class, pg_type WHERE pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND atthasdef='f' AND 
lower(relname)='$table' ");                                             
    while($r = pg_fetch_row($res2))
    {
    $str .= "\n" . $r[1]. " " . $r[2];
     if ($r[2]=="varchar")
    {
    $str .= "(".$r[3] .")";
    }
    if ($r[4]=="t")
    {
    $str .= " NOT NULL";
    }
    if ($r[5]=="t")
    {
    $str .= " DEFAULT ".$r[6];
    }
    $str .= ",";
    }
    $str=rtrim($str, ",");  
    $str .= "\n);\n";
    $str .= "\n--\n";
    $str .= "-- Creating data for '$table'";
    $str .= "\n--\n\n";

    
    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;  
      $str .= "\n";
    }
    
     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
    $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
    }   
  }
  $res = pg_query(" SELECT
  cl.relname AS tabela,ct.conname,
   pg_get_constraintdef(ct.oid)
   FROM pg_catalog.pg_attribute a
   JOIN pg_catalog.pg_class cl ON (a.attrelid = cl.oid AND cl.relkind = 'r')
   JOIN pg_catalog.pg_namespace n ON (n.oid = cl.relnamespace)
   JOIN pg_catalog.pg_constraint ct ON (a.attrelid = ct.conrelid AND
   ct.confrelid != 0 AND ct.conkey[1] = a.attnum)
   JOIN pg_catalog.pg_class clf ON (ct.confrelid = clf.oid AND 
clf.relkind = 'r')
   JOIN pg_catalog.pg_namespace nf ON (nf.oid = clf.relnamespace)
   JOIN pg_catalog.pg_attribute af ON (af.attrelid = ct.confrelid AND
   af.attnum = ct.confkey[1]) order by cl.relname ");
  while($row = pg_fetch_row($res))
  {
    $str .= "\n\n--\n";
    $str .= "-- Creating relacionships for '".$row[0]."'";
    $str .= "\n--\n\n";
    $str .= "ALTER TABLE ONLY ".$row[0] . " ADD CONSTRAINT " . $row[1] . 
" " . $row[2] . ";";
  }       
  fwrite($back,$str);
  fclose($back);
  dl_file("$dbname.sql");
  break;
}

?>