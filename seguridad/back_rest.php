<?php
    $action  = $_POST["actionButton"];
    $ficheiro=$_FILES["respaldo"]["name"];
    switch ($action){
        case "Import":
            $dbconn = pg_pconnect("host=localhost port=5432 dbname=db_alcaldia user=postgres password=root"); //connection string
            if (!$dbconn) {
                echo "No se puede conectar con la base de datos, restauracion abortada.\n";
                exit;
            }
            $back = fopen($ficheiro,"r");
            $contents = fread($back, filesize($ficheiro));
            $res = pg_query(utf8_encode($contents));
            echo "Restauracion exitosa, se restauraron todos los datos";
            fclose($back);
            break;
        case "Export":
            $dbname = "bkp/Backup_db_alcaldia".date('d.m.Y.G.i.s').".sql"; //database name
            $dbconn = pg_pconnect("host=localhost port=5432 dbname=db_alcaldia user=postgres password=root"); //connectionstring
            if (!$dbconn) {
                echo "No se puede conectar.\n";
                exit;
            }
            $back = fopen($dbname,"w");
            $res = pg_query("select relname as tablename from pg_class where relkind in ('r') and relname not like 'pg_%' and relname not like 'sql_%' order by tablename");
            $str0="--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

";
$str="";
$str1="";
            while($row = pg_fetch_row($res)){
                $table = $row[0];
                $str1 .= "--\n";
                $str1 .= "-- Estrutura de tabla '$table'";
                $str1 .= "\n--";
                $str1 .= "\nDROP TABLE IF EXISTS $table CASCADE;";
                $str1 .= "\nCREATE TABLE $table (";
                $res1 = pg_query("
                    SELECT  attnum,attname,typname,atttypmod-4,attnotnull,atthasdef,adsrc AS def
                    FROM pg_attribute, pg_class, pg_type, pg_attrdef 
                    WHERE pg_class.oid=attrelid
                    AND pg_type.oid=atttypid 
                    AND attnum>0 
                    AND pg_class.oid=adrelid 
                    AND adnum=attnum
                    AND atthasdef='t' 
                    AND lower(relname)='$table' 
                    UNION
                    SELECT attnum,attname,typname,atttypmod-4,attnotnull,atthasdef,'' AS def
                    FROM pg_attribute, pg_class, pg_type 
                    WHERE pg_class.oid=attrelid
                    AND pg_type.oid=atttypid 
                    AND attnum>0 
                    AND atthasdef='f' 
                    AND lower(relname)='$table'
                    ORDER BY attnum
                    ;
                ");  
                $serial=false;
                $nameSerial=""; 
                $nameSerialSeq="";                                       
                while($r = pg_fetch_row($res1)){
                    $str1 .= "\n\t".$r[1]." ";
                    if ($r[5]=="t"){
                        if(strpos($r[6], "extval(")){
                            if ($r[2]=="int4"){
                                $str1 .= "integer";
                            }
                            else{
                                if ($r[2]=="int8"){
                                    $str1 .= "bigint";
                                }
                                else{
                                    $str1 .= $r[2];
                                }
                            }
                            $serial=true;
                            $nameSerial=$r[1]; 
                        }
                    }else{
                        if ($r[2]=="varchar"){
                            $str1 .= "character varying(".$r[3] .")";
                        }else{
                            if ($r[2]=="float8"){
                                $str1 .= "double precision";
                            }
                            else{
                                if ($r[2]=="bool"){
                                    $str1 .= "boolean";
                                }
                                else{
                                    if ($r[2]=="int4"){
                                        $str1 .= "integer";
                                    }
                                    else{
                                        if ($r[2]=="time"){
                                            $str1 .= "time without time zone";
                                        }
                                        else{
                                            if ($r[2]=="bpchar"){
                                                $str1 .= "character(".$r[3] .")";
                                            }
                                            else{
                                                if ($r[2]=="int8"){
                                                    $str1 .= "bigint";
                                                }
                                                else{
                                                    $str1 .= $r[2];
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if ($r[4]=="t"){
                        $str1 .= " NOT NULL";
                    }
                    if ($r[5]=="t"){
                        $str1 .= " DEFAULT ".$r[6];
                        $nameSerialSeq=substr($r[6],9,-12);
                    }
                    $str1 .= ",";
                }
                $str1=rtrim($str1, ",");  
                $str1 .= "\n);\n";

                $res25=pg_query("SELECT MAX(".$nameSerial.") FROM ".$table.";");
                if($r = pg_fetch_row($res25)){
                    $start=($r[0]+1);
                }
                else{
                    $start=1;
                }

                if($serial){
                    $str .= "\n\n CREATE SEQUENCE ".$nameSerialSeq."
    START WITH ".$start."
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    ";
                }
    $str.=$str1;
    $str1="";
                if($serial){
                    $str .= "\n\n ALTER SEQUENCE ".$nameSerialSeq." OWNED BY ".$table.".".$nameSerial.";";
                }
                /////////////////////////////////////////DATOS
                $str .= "--\n";
                $str .= "-- Creando datos de '$table'";
                $str .= "\n--\n";
                $res3 = pg_query("SELECT * FROM $table");
                while($r = pg_fetch_row($res3)){
                    $sql = "INSERT INTO $table VALUES ('";
                    $sql .= utf8_decode(implode("','",$r));
                    $sql .= "');";
                    $str = str_replace("''","NULL",$str);
                    $str .= $sql;  
                    $str .= "\n";
                }
                ///////////////////////////////INDICES
                $res2 = pg_query("
                    SELECT pg_index.indisprimary,pg_catalog.pg_get_indexdef(pg_index.indexrelid)
                    FROM pg_catalog.pg_class c,pg_catalog.pg_class c2,pg_catalog.pg_index AS pg_index
                    WHERE c.relname = '$table'
                    AND c.oid = pg_index.indrelid
                    AND pg_index.indexrelid = c2.oid
                    AND pg_index.indisprimary
                    ;
                ");
                while($r = pg_fetch_row($res2)){
                    $str .= "--\n";
                    $str .= "-- Creando indices PrimaryKey '$table'";
                    $str .= "\n--\n";
                    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
                    $t = str_replace("USING btree", "|", $t);
                    // Next Line Can be improved!!!
                    $t = str_replace("ON", "|", $t);
                    $Temparray = explode("|", $t);
                    $str .= "ALTER TABLE ONLY ".$Temparray[1]." ADD CONSTRAINT ".$Temparray[0]." PRIMARY KEY ".$Temparray[2].";\n";
                } 
                ///////////////////////////////UNIQUES
                $res3 = pg_query("
                    select pco.conname as restriccion,pat.attname as columna
                    from pg_constraint pco
                    join pg_class pcl on (pco.conrelid = pcl.oid)
                    join pg_attribute pat on (pat.attrelid = pco.conindid)
                    where pco.contype = 'u'
                    and pcl.relname = '$table'
                    ;
                ");
                $str .= "--\n";
                $str .= "-- Creando indices Unique '$table'";
                $str .= "\n--\n";
                $fk="";
                $campos="";
                while($r = pg_fetch_row($res3)){
                    if($fk!=$r[0]){
                        if($campos!=""){
                            $str .= "ALTER TABLE ONLY ".$table." ADD CONSTRAINT ".$fk." UNIQUE (".$campos.");";
                            $fk=$r[0];
                            $campos=$r[1];
                        }else{
                            $fk=$r[0];
                            $campos=$r[1];
                        }
                    }else{
                        $campos.=",".$r[1];
                    }
                } 
                if($campos!=""){
                    $str .= "ALTER TABLE ONLY ".$table." ADD CONSTRAINT ".$fk." UNIQUE (".$campos.");";
                }
                $str .= "\n\n";
            }
            $res4 = pg_query(" 
                SELECT cl.relname AS tabela,ct.conname,pg_get_constraintdef(ct.oid)
                FROM pg_catalog.pg_attribute a
                JOIN pg_catalog.pg_class cl ON (a.attrelid = cl.oid AND cl.relkind = 'r')
                JOIN pg_catalog.pg_namespace n ON (n.oid = cl.relnamespace)
                JOIN pg_catalog.pg_constraint ct ON (a.attrelid = ct.conrelid AND ct.confrelid != 0 AND ct.conkey[1] = a.attnum)
                JOIN pg_catalog.pg_class clf ON (ct.confrelid = clf.oid AND clf.relkind = 'r')
                JOIN pg_catalog.pg_namespace nf ON (nf.oid = clf.relnamespace)
                JOIN pg_catalog.pg_attribute af ON (af.attrelid = ct.confrelid AND af.attnum = ct.confkey[1]) order by cl.relname
                ;
            ");
            while($row = pg_fetch_row($res4)){
                $str .= "\n\n--\n";
                $str .= "-- Creating relacionships for '".$row[0]."'";
                $str .= "\n--\n\n";
                $str .= "ALTER TABLE ONLY ".$row[0]." ADD CONSTRAINT ".$row[1]." ".$row[2].";";
            }       

            fwrite($back,$str0.$str);
            fclose($back);
            //dl_file($dbname);
            echo $dbname;
            //echo "Revise su carpeta de descargas";
            break;
    }
?>
