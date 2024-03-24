#!/usr/bin/php -q
<?php
$con=mssql_connect("MyServer2008","sa","sms123peru");
$condb=mssql_select_db("sms_alert",$con);

require('phpagi/phpagi.php');

$Anexo_res =  $argv[1];
$Origen_res = $argv[2];
$Destino_res = $argv[3];
$Fecha_Ini_res = $argv[4];
$Fecha_Fin_res = $argv[5];
$Tipo_Llamada_res = $argv[6];
$Duracion_total_res = $argv[7];
$Duracion_hablado_res = $argv[8];
$Estado_Llamada_res = $argv[9];

$agi=new AGI();

//$agi->NoOp($Anexo_res);
//$agi->NoOp($Origen_res);
//$agi->NoOp($Destino_res);
//$agi->NoOp($Fecha_Ini_res);
//$agi->NoOp($Fecha_Fin_res);
//$agi->NoOp($Tipo_Llamada_res);
//$agi->NoOp($Duracion_total_res);
//$agi->NoOp($Duracion_hablado_res);
//$agi->NoOp($Estado_Llamada_res);

$agi->exec('NoOp "'.$Anexo_res.'"');
$agi->exec('NoOp "'.$Origen_res.'"');
$agi->exec('NoOp "'.$Destino_res.'"');
$agi->exec('NoOp "'.$Fecha_Ini_res.'"');
$agi->exec('NoOp "'.$Fecha_Fin_res.'"');
$agi->exec('NoOp "'.$Tipo_Llamada_res.'"');
$agi->exec('NoOp "'.$Duracion_total_res.'"');
$agi->exec('NoOp "'.$Duracion_hablado_res.'"');
$agi->exec('NoOp "'.$Estado_Llamada_res.'"');


mssql_query("execute SMSAlert_sps_AST_GrabaLlamada '".$Anexo_res."','".$Origen_res."','".$Destino_res."','".$Fecha_Ini_res."','".$Fecha_Fin_res."',".$Tipo_Llamada_res.",".$Duracion_total_res.",".$Duracion_hablado_res.",'".$Estado_Llamada_res."'");


?>
